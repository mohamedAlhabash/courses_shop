<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/',[adminController::class,'index'])->name('home');
    Route::resource('categories',CategoryController::class);
    Route::resource('courses',CourseController::class);
});

Route::prefix('courses_shop')->name('courses_shop.')->group(function(){
    Route::get('',[PageController::class,'index'])->name('homepage');
    Route::get('course/{slug}',[PageController::class,'course'])->name('coursepage');
    Route::get('contact',[PageController::class,'contact'])->name('contactpage');
    Route::get('pay',[PageController::class,'pay'])->name('paypage');
    Route::get('register/{slug}',[PageController::class,'register'])->name('registerpage');
    Route::post('register/{slug}',[PageController::class,'registerSubmet'])->name('registerSubmet');
});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
