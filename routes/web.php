<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TourPackageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route to show the home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route to show the detail page
Route::get('/detail', [DetailController::class, 'index'])->name('detail');

// Route to show the checkout page
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Route to show the checkout success page
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout-success');



//Route to show the admin dashboard
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class,'index'])->name('admin.dashboard');

        Route::resource('tour-package', TourPackageController::class);
        Route::resource('gallery', GalleryController::class);
    
    });
    
// verify the user email address    
Auth::routes(['verify' => true]);
