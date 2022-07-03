<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TourPackageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
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
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');

// Route post to process the checkout
Route::post('/checkout/{id}', [CheckoutController::class, 'process'])
    ->name('checkout_process')
    ->middleware('auth', 'verified');

// Route get to show the checkout page
Route::get('/checkout/{id}', [CheckoutController::class, 'index'])
    ->name('checkout')
    ->middleware('auth', 'verified');

//route post for user add member to cart
Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])
    ->name('checkout-create')
    ->middleware('auth', 'verified');

//route get for user delete member from cart
Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])
    ->name('checkout-remove')
    ->middleware('auth', 'verified');

// route get for complete the checkout
Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])
    ->name('checkout-success')
    ->middleware('auth', 'verified');


//Route to show the admin dashboard
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        // Route to show the admin dashboard
        Route::get('/', [DashboardController::class,'index'])->name('admin.dashboard');
        // Route to show the tour package page
        Route::resource('tour-package', TourPackageController::class);
        // Route to show the gallery page
        Route::resource('gallery', GalleryController::class);
        // Route to show the transaction page
        Route::resource('transaction', TransactionController::class);
    });
    
// verify the user email address    
Auth::routes(['verify' => true]);
