<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('backend')->name('backend.')->group(function(){
    Route::resource('category',CategoryController::class);
    Route::get('category/index',[CategoryController::class,'index'])->name('category.index');

});
