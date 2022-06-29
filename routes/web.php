<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TourPackageController;
use App\Http\Controllers\Admin\GalleryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class,'index'])->name('admin.dashboard');

        Route::resource('tour-package', TourPackageController::class);
        Route::resource('gallery', GalleryController::class);
    
    });