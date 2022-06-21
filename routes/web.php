<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/',[adminController::class,'index'])->name('home');
    Route::resource('categories',CategoryController::class);
    Route::resource('courses',CourseController::class);
});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
