<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/students',[
    \App\Http\Controllers\StudentController::class, 'getAllStudents'
])->name('get-students');

Route::get('/students/conditions',[
    \App\Http\Controllers\StudentController::class, 'staffIndex'
])->name('query-students');

Route::get('/students/info',[
    \App\Http\Controllers\StudentController::class, 'getStudentByUserId'
])->name('get-students-info');


//Course

Route::get('/students/enrolled', [
    \App\Http\Controllers\CourseController::class, 'getEnrolledCourseByStudentId'
])->name('get-enrolled-course');

//Resource
Route::resource('/students', StudentController::class);

//PDF

Route::get('/pdf/resignation', [\App\Http\Controllers\PDF\PDFResignationController::class, 'pdf'])->name('pdf-resignation.pdf');
Route::get('/pdf/leave-request', [\App\Http\Controllers\PDF\PDFLeaveRequestController::class, 'pdf'])->name('pdf-leave-request.pdf');
Route::get('/pdf/ku3', [\App\Http\Controllers\PDF\PDFKU3Controller::class, 'pdf'])->name('pdf-ku3.pdf');

// Front-side
//Route::get('/', [ProfileController::class, 'edit'])->name('profile');

// Route for Test
Route::get('/test', function () {return view('/ui_staff/grade/list_grade');})->name('test');
Route::get('/staff/announcements/', function () {return view('/ui_staff/announcement/index');})->name('announcements');

Route::get('/announcement', function () {return view('/announcement/index');})->name('announcement');
Route::get('/announcement/create', function () {return view('/announcement/create');})->name('create-announcement');
Route::get('/announcement/detail', function () {return view('/announcement/detail');})->name('detail-announcement');
Route::get('/announcement/edit', function () {return view('/announcement/edit');})->name('edit-announcement');

Route::get('/document', function () {return view('/document/index');})->name('document');
Route::get('/document/create', function () {return view('/document/create');})->name('create-document');

Route::get('/grade', function () {return view('/grade/index');})->name('grade');
Route::get('/grade/alumni', function () {return view('/grade/alumni');})->name('alumni-grade');
Route::get("/grade/create-alumni",function () {return view('/grade/create-alumni');})->name("create-alumni-grade");
Route::get('/grade/list', function () {return view('/grade/list');})->name('list-grade');


Route::get('/achievement', function () {return view('/achievement/index');})->name('achievement');
Route::get('/achievement/create', function () {return view('/achievement/create');})->name('create-achievement');

Route::get('/profile', function () {return view('/profile/index');})->name('profile');

Route::get('/activity', function () {return view('/activity/index');})->name('activity');


