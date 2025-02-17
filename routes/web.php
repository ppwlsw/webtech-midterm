<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentGradeController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/students',[
        \App\Http\Controllers\StudentController::class, 'getAllStudents'
    ])->name('get-students');

    Route::get('/student/info',[
        \App\Http\Controllers\StudentController::class, 'getStudentByUserId'
    ])->name('get-students-info');


//Resource
    Route::resource('/students', StudentController::class);
    Route::get('/staff/edit', [StudentController::class, 'editStudentsPage'] )->name('edit-student');
    Route::get('/staff/search', [StudentController::class, 'search'])->name('students.search');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
//PDF

    Route::get('/pdf/resignation', [\App\Http\Controllers\PDF\PDFResignationController::class, 'pdf'])->name('pdf-resignation.pdf');
    Route::get('/pdf/leave-request', [\App\Http\Controllers\PDF\PDFLeaveRequestController::class, 'pdf'])->name('pdf-leave-request.pdf');
    Route::get('/pdf/ku3', [\App\Http\Controllers\PDF\PDFKU3Controller::class, 'pdf'])->name('pdf-ku3.pdf');
    Route::get('/pdf/ku1', [\App\Http\Controllers\PDF\PDFKU1Controller::class, 'pdf'])->name('pdf-ku1.pdf');
    Route::get('/pdf/general-request', [\App\Http\Controllers\PDF\PDFGeneralRequestController::class, 'pdf'])->name('pdf-general-request.pdf');
    Route::get('/pdf/study-colab', [\App\Http\Controllers\PDF\PDFStudyColabController::class, 'pdf'])->name('pdf-study-colab.pdf');

    Route::get('/staff/announcements/', function () {return view('/ui_staff/announcement/index');})->name('announcements');

    Route::get('/announcement', [ActivityController::class, 'index'])->name('announcement');
    Route::get('/announcement/activity', [ActivityController::class, 'show'])->name('announcement.show');
    Route::get('/announcement/create', [ActivityController::class, 'create'])->name('announcement.create');
    Route::post('/announcement/store', [ActivityController::class, 'store'])->name('announcement.store');
    Route::get('/announcement/{activity}/edit', [ActivityController::class, 'edit'])->name('announcement.edit');
    Route::put('/announcement/{activity}', [ActivityController::class, 'update'])->name('announcement.update');
    Route::get('/announcement/join/{activityId}', [StudentController::class, 'joinActivity'])->name('announcement.join');

    Route::get('/document', function () {return view('/document/index');})->name('document');
    Route::get('/document/create', function () {return view('/document/create');})->name('create-document');

    Route::get('/grade', [
        \App\Http\Controllers\StudentController::class, 'index'
    ])->name('grade');

    Route::get('staff/student-grade', [StudentController::class, 'staffIndex'])->name('grade-staff');
    Route::get('staff/student-grade/search', [StudentController::class, 'filterStudents'])->name('grade-staff-search');

    Route::get('/grade/alumni', function () {return view('/grade/alumni');})->name('alumni-grade');
    Route::get("/grade/create-alumni",function () {return view('/grade/create-alumni');})->name("create-alumni-grade");
    Route::get('/grade/list', function () {return view('/grade/list');})->name('list-grade');

    Route::get('/achievement', [AchievementController::class, 'index'])->name('achievement');
    Route::get('/achievement/create', [AchievementController::class, 'create'])->name('create-achievement');
    Route::post('/achievement', [AchievementController::class, 'store'])->name('store-achievement');
    Route::get('/achievement/edit/{achievementId}', [AchievementController::class, 'edit'])->name('edit-achievement');
    Route::put('/achievement/{achievement}', [AchievementController::class, 'update'])->name('update-achievement');


    Route::get('/profile',[StudentController::class, 'profileIndex'])->name('profile');

    Route::get('/activity', [ActivityController::class, 'showStudentHistory'])->name('activity');

    //Course
    Route::get('/courses/available', [EnrollmentController::class, 'availableCourses'])->name('courses.available');
    Route::get('/courses/available/search', [EnrollmentController::class, 'search'])->name('courses.search');
    Route::post('/courses/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
    Route::get('/enrollments/pending', [EnrollmentController::class, 'pendingEnrollments'])->name('enrollments.pending');
    Route::post('/enrollments/approve', [EnrollmentController::class, 'approve'])->name('enrollments.approve');
    Route::post('/enrollments/reject', [EnrollmentController::class, 'reject'])->name('enrollments.reject');

    // Edit Grade
    Route::prefix('staff/student-grades')->group(function () {
        Route::get('/', [StudentGradeController::class, 'index'])->name('grades.index');
        Route::get('/student/{studentId}', [StudentGradeController::class, 'showEnrolledCourses'])->name('grades.courses');
        Route::get('/edit/{resultId}', [StudentGradeController::class, 'editGrade'])->name('grades.edit');
        Route::post('/update/{resultId}', [StudentGradeController::class, 'updateGrade'])->name('grades.update');
    });

});

Route::get('/', function () {return redirect('login');});
