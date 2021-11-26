<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('kurzy')->group(function () {
    Route::get('', [CourseController::class, 'index'])->name('courses.index');
    Route::get('{course}', [CourseController::class, 'show'])->name('courses.show');
});

Route::get('/kontakt', function () {
    return view('kontakt');
})->name('contact');

Route::prefix('login')->group(function () {
    Route::get('', [LoginController::class, 'showLoginForm'])->name('loginForm');
    Route::post('', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth:web')->get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:web')->name('admin.')->prefix('admin')->group(function () {
    Route::prefix('kurzy')->name('courses.')->group(function () {
        Route::get('novy', [CourseController::class, 'create'])->name('create');
        Route::post('novy', [CourseController::class, 'store'])->name('store');
        Route::get('{course}/edit', [CourseController::class, 'edit'])->name('edit');
        Route::put('{course}/edit', [CourseController::class, 'update'])->name('update');
        Route::delete('{course}', [CourseController::class, 'destroy'])->name('destroy');
    });
});

