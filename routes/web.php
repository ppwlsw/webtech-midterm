<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/students',[
    \App\Http\Controllers\StudentController::class, 'getStudents'
])->name('get-students');

Route::get('/students/conditions',[
    \App\Http\Controllers\StudentController::class, 'queryStudents'
])->name('query-students');









// Front-side
Route::get('/', function () {return view('login/index');});

Route::get('/announcement', function () {return view('/announcement/index');})->name('announcement');
Route::get('/announcement/create', function () {return view('/announcement/create');})->name('create-announcement');
Route::get('/announcement/detail', function () {return view('/announcement/detail');})->name('detail-announcement');


Route::get('/document', function () {return view('/document/index');})->name('document');
Route::get('/document/create', function () {return view('/document/create');})->name('create-document');

Route::get('/grade', function () {return view('/grade/index');})->name('grade');
Route::get('/grade/alumni', function () {return view('/grade/alumni');})->name('alumni-grade');
Route::get("/grade/create-alumni",function () {return view('/grade/create-alumni');})->name("create-alumni-grade");
Route::get('/grade/list', function () {return view('/grade/list');})->name('list-grade');


Route::get('/achievement', function () {return view('/achievement/index');})->name('achievement');
Route::get('/achievement/create', function () {return view('/achievement/create');})->name('create-achievement');

Route::get('/profile', function () {return view('/profile/index');})->name('profile');


Route::get('/login', function () {return view('login/index');})->name('login');

