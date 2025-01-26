<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

    Route::get('/staff/announcements/', function () {return view('/ui_staff/announcement/index');})->name('announcements');

    Route::get('/announcement', [ActivityController::class, 'index'])->name('announcement');
    Route::get('/announcement/activity', [ActivityController::class, 'show'])->name('announcement.show');
    Route::get('/announcement/create', [ActivityController::class, 'create'])->name('announcement.create');
    Route::post('/announcement/store', [ActivityController::class, 'store'])->name('announcement.store');
    Route::get('/announcement/{activity}/edit', [ActivityController::class, 'edit'])->name('announcement.edit');
    Route::put('/announcement/{activity}', [ActivityController::class, 'update'])->name('announcement.update');

    Route::get('/document', function () {return view('/document/index');})->name('document');
    Route::get('/document/create', function () {return view('/document/create');})->name('create-document');

    Route::get('/grade', [
        \App\Http\Controllers\StudentController::class, 'index'
    ])->name('grade');

    Route::get('/grade/alumni', function () {return view('/grade/alumni');})->name('alumni-grade');
    Route::get("/grade/create-alumni",function () {return view('/grade/create-alumni');})->name("create-alumni-grade");
    Route::get('/grade/list', function () {return view('/grade/list');})->name('list-grade');

    Route::get('/achievement', [AchievementController::class, 'index'])->name('achievement');
    Route::get('/achievement/create', [AchievementController::class, 'create'])->name('create-achievement');
    Route::post('/achievement', [AchievementController::class, 'store'])->name('store-achievement');
    Route::get('/achievement/edit/{achievementId}', [AchievementController::class, 'edit'])->name('edit-achievement');
    Route::put('/achievement/{achievement}', [AchievementController::class, 'update'])->name('update-achievement');


    Route::get('/profile',[StudentController::class, 'profileIndex'])->name('profile');

    Route::get('/activity', function () {return view('/activity/index');})->name('activity');
});

Route::get('/', function () {return redirect('login');});
