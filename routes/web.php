<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('announcement/index');
});

Route::get('/announcement', function () {
    return view('announcement/index');
})->name('announcement');

Route::get('/document', function () {
    return view('document/index');
})->name('document');

Route::get('/grade', function () {
    return view('grade/index');
})->name('grade');

Route::get('/achievement', function () {
    return view('achievement/index');
})->name('achievement');

Route::get('/profile', function () {
    return view('profile/index');
})->name('profile');

Route::get('/login', function () {
    return view('login/index');
})->name('login');



