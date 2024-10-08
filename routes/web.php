<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    // Classes
    Route::get('/class', [ClassesController::class, 'index'])->name('classes.index');
    Route::get('/class/create', [ClassesController::class, 'create'])->name('classes.create');
    Route::post('/class', [ClassesController::class, 'store'])->name('classes.store');
    Route::get('/classes/{class}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::put('/classes/{class}', [ClassesController::class, 'update'])->name('classes.update');
    Route::delete('/classes/{class}', [ClassesController::class, 'destroy'])->name('classes.destroy');

    // Student
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');


    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
