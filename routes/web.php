<?php

use App\Http\Controllers\FormsController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/forms', [FormsController::class,'index'])->name('mainPage');

// Route::get('/forms/groups', [FormsController::class, 'findGroups'])->name('find.groups');

// Route::get('/forms/courses', [FormsController::class, 'findStudentsOnCourse'])->name('find.students');


Route::prefix('forms')->group(function () {
    Route::get('/', [FormsController::class, 'index'])->name('mainPage');
    Route::get('/groups', [FormsController::class,'findGroups'])->name('find.groups');
    Route::get('/students', [FormsController::class, 'findStudentsOnCourse'])->name('find.students');
    Route::post('/', [StoreController::class, 'addNewStudent'])->name('add.student');
    

    });



