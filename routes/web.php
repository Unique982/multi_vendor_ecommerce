<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VendorController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::prefix('vendor')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

// category
Route::prefix('admin')->name('backend.')->group(function(){
    Route::resource('category',CategoryController::class);

});

// vendor
Route::prefix('admin')->name('backend.')->group(function(){
    Route::resource('vendor',VendorController::class);

});

// product
Route::prefix('admin')->name('backend.')->group(function(){
    Route::resource('product',ProductController::class);

});