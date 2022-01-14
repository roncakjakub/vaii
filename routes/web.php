<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStudentsController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\LicenceTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('licencie')->group(function () {
    Route::get('', [LicenceTypeController::class, 'index'])->name('licence_types.index');
    Route::get('{type}', [CourseController::class, 'getByLicenceTypeCode'])->name('courses.getAvailableByTypeCode');
});

Route::prefix('ziadosti')->group(function () {
    Route::post('nova', [CourseStudentsController::class, 'store'])
        ->name('course_students.store');
});

Route::prefix('kontakt')->group(function () {
    Route::get('', ContactController::class)
        ->name('contact');
    Route::post('nova', [ContactController::class, 'send'])
        ->name('contact.sendEmail');
});

Route::get('kontakt', function () {
    return view('kontakt');
})->name('contact');

Route::prefix('login')->group(function () {
    Route::get('', [LoginController::class, 'showLoginForm'])->name('loginForm');
    Route::post('', CustomLoginController::class)->name('login');
});

Route::middleware('auth:web')->get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:web')->name('admin.')->prefix('admin')->group(function () {
    // Kurzy
    Route::prefix('licencie')->name('licence_types.')->group(function () {
        Route::get('novy', [LicenceTypeController::class, 'create'])->name('create');
        Route::post('novy', [LicenceTypeController::class, 'store'])->name('store');
        Route::get('{type}/edit', [LicenceTypeController::class, 'edit'])->name('edit');
        Route::put('{type}/edit', [LicenceTypeController::class, 'update'])->name('update');
        Route::delete('{type}', [LicenceTypeController::class, 'destroy'])->name('destroy');
    });

    // Žiadosti o kurzy
//    Route::prefix('ziadosti')->name('course_requests')->group(function () {
//        Route::get('{course}/edit', [CourseController::class, 'edit'])->name('edit');
//        Route::put('{course}/edit', [CourseController::class, 'update'])->name('update');
//        Route::delete('{course}', [CourseController::class, 'destroy'])->name('destroy');
//    });

    // kurzy
    Route::prefix('kurzy')->name('courses.')->group(function () {
        Route::get('', [CourseController::class, 'index'])->name('index');
        Route::get('novy', [CourseController::class, 'create'])->name('create');
        Route::post('novy', [CourseController::class, 'store'])->name('store');
        Route::get('{course}/uprava', [CourseController::class, 'edit'])->name('edit');
        Route::put('{course}/uprava', [CourseController::class, 'update'])->name('update');
        Route::delete('{course}', [CourseController::class, 'destroy'])->name('destroy');
    });

    //studenti
    Route::prefix('studenti')->name('students.')->group(function () {
        Route::get('', [StudentController::class, 'index'])->name('index');
        Route::get('novy', [StudentController::class, 'create'])->name('create');
        Route::post('novy', [StudentController::class, 'store'])->name('store');
        Route::get('{student}/uprava', [StudentController::class, 'edit'])->name('edit');
        Route::put('{student}/uprava', [StudentController::class, 'update'])->name('update');
        Route::delete('{student}', [StudentController::class, 'destroy'])->name('destroy');
    });

    //ucitelia
    Route::prefix('ucitelia')->name('teachers.')->group(function () {
        Route::get('', [TeacherController::class, 'index'])->name('index');
        Route::get('novy', [TeacherController::class, 'create'])->name('create');
        Route::post('novy', [TeacherController::class, 'store'])->name('store');
        Route::get('{teacher}/uprava', [TeacherController::class, 'edit'])->name('edit');
        Route::put('{teacher}/uprava', [TeacherController::class, 'update'])->name('update');
        Route::delete('{teacher}', [TeacherController::class, 'destroy'])->name('destroy');
    });


    //vozidla
    Route::prefix('vozidla')->name('vehicles.')->group(function () {
        Route::get('', [VehicleController::class, 'index'])->name('index');
        Route::get('novy', [VehicleController::class, 'create'])->name('create');
        Route::post('novy', [VehicleController::class, 'store'])->name('store');
        Route::get('{vehicle}/uprava', [VehicleController::class, 'edit'])->name('edit');
        Route::put('{vehicle}/uprava', [VehicleController::class, 'update'])->name('update');
        Route::delete('{vehicle}', [VehicleController::class, 'destroy'])->name('destroy');
    });
});

