<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Student;
use App\Models\User;
use App\Repositories\CourseRepository;
use App\Repositories\RegistrationRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function __construct(
        private StudentRepository $studentRepository,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('teacherView', User::class)){
            return redirect()->route('grade-staff');
        }

        Gate::authorize('studentView', User::class);
        $student = $this->studentRepository->getStudentByUserId(auth()->guard()->user()->id);
        $courses = $this->studentRepository->getStudentEnrolledCourses($student->id);
        return view('grade.index', ["data" => $student
                                        , "coursesData" => $courses ]);

    }
    public function show(Student $student)
    {
        //
        return view('students.show', [
            'student' => $this->studentRepository->getById(auth()->user()->student->id),
        ]);
    }
    public function profileIndex()
    {
        if (Gate::allows('studentView', User::class)) {
            $userId = auth()->guard()->user()->id;
            $data = $this->studentRepository->getStudentByUserId($userId);
           return view('profile.index',["data" => $data]);
        }
    }

    public function editStudentsPage(){
            return view('grade.student-list', ["data" => $this->studentRepository->getAll()]);
    }

    public function getAllStudents(Request $request)
    {
        Gate::authorize('getAllStudents', User::class);
        return $this->studentRepository->getActiveStudents($request);
    }

    public function staffIndex(){
        $data = $this->studentRepository->getAll();
        foreach ($data as $student) {
            $student->courses = $student->courses()->select(
                'course_code',
                'course_name',
                'credit',
                'course_grade',
                'course_category'
            )->get()->toArray();
        }
      return view('grade.index', ["data" => $data]);
    }

    public function filterStudents(Request $request){
        Gate::authorize('teacherView', User::class);
        $curriculum = $request->get('course_curriculum') ;
        $student_type = $request->get('student_type');
        $student_name = $request->get('student_name');
        $student_code = $request->get('student_code');
        $course_code = $request->get('course_code');

        $request = [
            'course_curriculum' => $curriculum,
            'student_type' => $student_type,
            'student_name' => $student_name,
            'student_code' => $student_code,
            'course_code' => $course_code,
        ];

        $data = $this->studentRepository->filterStudents($request);
        if ($data->has('message')) {
            return view('grade.index', ["data" => $data]);
        }
        foreach ($data as $student) {
            $student->courses = $student->courses()->select(
                'course_code',
                'course_name',
                'credit',
                'course_grade',
                'course_category'
            )->get()->toArray();
        }

        return view('grade.index', ["data" => $data]);
    }
    public function search(Request $request)
    {
        $query = Student::query();

        // Search by student code
        if ($request->filled('student_code')) {
            $studentCode = $request->student_code;
            $query->where('student_code', 'LIKE', "%{$studentCode}%");
        }

        // Search by name (first name or last name)
        if ($request->filled('name')) {
            $name = $request->name;
            $query->where(function($q) use ($name) {
                $q->where('first_name', 'LIKE', "%{$name}%")
                    ->orWhere('last_name', 'LIKE', "%{$name}%");
            });
        }

        // Search by curriculum
        if ($request->filled('curriculum')) {
            $curriculum = $request->curriculum;
            $query->where('curriculum', 'LIKE', "%{$curriculum}%");
        }

        // Search by student type
        if ($request->filled('student_type')) {
            $studentType = $request->student_type;
            $query->where('student_type', $studentType);
        }

        // Search by status
        if ($request->filled('status')) {
            $status = $request->status;
            $query->where('student_status', $status);
        }



        $data = $query->get();

        return view('grade.student-list', ["data" => $data]);
    }

    public function edit(Student $student)
    {
        return view('grade.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $role = auth()->user()->role;

        if ($student->student_status === 'inactive') {
            return back()->with('error', 'ไม่สามารถแก้ไขข้อมูลนิสิตที่จบการศึกษาแล้ว');
        }

        $student->update($request->all());


        $data = $student->toArray();

        if($role == 'DEPARTMENT'||'TEACHER'){
            return redirect()->route('edit-student');
        }

        return redirect()->route('students.show', ['student' => $student])
            ->with('success', 'อัพเดทสถานะนิสิตเรียบร้อยแล้ว');
    }
    public function create(){
        return view('students.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'student_code' => 'required|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'student_type' => 'required|in:regular,special',
            'contact_info' => 'nullable',
            'telephone_num' => 'required',
            'curriculum' => 'required',
            'admission_channel' => 'required',
            'admission_year' => 'required|numeric',
            'semester' => 'required',

        ]);


        DB::transaction(function () use ($validated) {
            $user = User::create([
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'STUDENT',
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'remember_token' => Str::random(10),

            ]);
            $student = new Student([
                'student_code' => $validated['student_code'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'student_type' => $validated['student_type'],
                'contact_info' => $validated['contact_info'],
                'telephone_num' => $validated['telephone_num'],
                'curriculum' => $validated['curriculum'],
                'admission_channel' => $validated['admission_channel'],
                'admission_year' => $validated['admission_year'],
                'student_status' => 'active',
                'semester' => $validated['semester'],
            ]);
            $user->student()->save($student);
        });
        return view('students.create');
    }

    public function joinActivity(Request $request, $activityId, RegistrationRepository $registrationRepository)
    {
        $student = $this->studentRepository->getStudentByUserId(auth()->guard()->user()->id);
        $activity = Activity::findOrFail($activityId);

        if ($activity->students()->count() >= $activity->max_participants) {
            return redirect()->back()->with('error', 'กิจกรรมเต็มแล้ว');
        }

        if ($activity->students()->where('student_id', $student->id)->exists()) {
            return redirect()->back()->with('info', 'คุณเข้าร่วมกิจกรรมนี้แล้ว');
        }

        if (!now()->between($activity->join_start_datetime, $activity->join_end_datetime)) {
            return redirect()->back()->with('error', 'หมดเขตรับสมัครแล้ว');
        }

        $registrationRepository->create([
            'student_id' => $student->id,
            'activity_id' => $activity->id,
            'time_stamp' => now(),
        ]);

        return redirect()->route('announcement.show', ['activity' => $activityId])
            ->with('success', 'เข้าร่วมกิจกรรมเรียบร้อยแล้ว');
    }

}
