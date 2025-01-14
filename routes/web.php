<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/announcement', function () {
    return view('announcement');
});
Route::get('/event_detail', function () {
    return view('event_detail');
});
Route::get('/document', function () {
    return view('document');
});
Route::get('/grade', function () {
    return view('grade');
});
Route::get('/profile', function () {
    return view('profile');
});

require __DIR__.'/auth.php';
