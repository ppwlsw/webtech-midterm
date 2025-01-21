<?php

use App\Http\Controllers\ActivityController;
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

Route::get('/student/info',[
    \App\Http\Controllers\StudentController::class, 'getStudentByUserId'
])->name('get-students-info');


//Course
Route::get('/students/enrolled', [
    \App\Http\Controllers\StudentController::class, 'getEnrolledCourseByStudentCode'
])->name('get-enrolled-course');

//Resource
Route::resource('/students', StudentController::class);
Route::resource('/alumni', AlumniController::class);
Route::get('/alumni/show', [alumniController::class, 'show'])->name('alumni.show');
    Route::resource('/students', StudentController::class);
    Route::get('/staff/edit', [StudentController::class, 'editStudentsPage'] )->name('edit-student');
    Route::get('/staff/search', [StudentController::class, 'search'])->name('students.search');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
//PDF

Route::get('/pdf/resignation', [\App\Http\Controllers\PDF\PDFResignationController::class, 'pdf'])->name('pdf-resignation.pdf');
Route::get('/pdf/leave-request', [\App\Http\Controllers\PDF\PDFLeaveRequestController::class, 'pdf'])->name('pdf-leave-request.pdf');
Route::get('/pdf/ku3', [\App\Http\Controllers\PDF\PDFKU3Controller::class, 'pdf'])->name('pdf-ku3.pdf');

Route::get('/staff/announcements/', function () {return view('/ui_staff/announcement/index');})->name('announcements');


Route::get('/login', function () {return view('auth/login');})->name('login');

Route::get('/announcement', [ActivityController::class, 'index'])->name('announcement');
Route::get('/announcement/detail', [ActivityController::class, 'show'])->name('detail-announcement');


Route::get('/announcement/create', function () {return view('/announcement/create');})->name('create-announcement');
Route::get('/announcement/edit', function () {return view('/announcement/edit');})->name('edit-announcement');

Route::get('/document', function () {return view('/document/index');})->name('document');
Route::get('/document/create', function () {return view('/document/create');})->name('create-document');

Route::get('/grade/index', [
    \App\Http\Controllers\StudentController::class, 'index'
])->name('grade');


Route::get('/grade/alumni', function () {return view('/grade/alumni');})->name('alumni-grade');
Route::get("/grade/create-alumni",function () {return view('/grade/create-alumni');})->name("create-alumni-grade");
Route::get('/grade/list', function () {return view('/grade/list');})->name('list-grade');


Route::get('/achievement', function () {return view('/achievement/index');})->name('achievement');
Route::get('/achievement/create', function () {return view('/achievement/create');})->name('create-achievement');

Route::get('/profile',[StudentController::class, 'profileIndex'])->name('profile');

Route::get('/activity', function () {return view('/activity/index');})->name('activity');


