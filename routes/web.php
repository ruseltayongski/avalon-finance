<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/test', function () {
    return view('test');
})->name('test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
Route::post('/email', [App\Http\Controllers\HomeController::class, 'sendEmail'])->name('send.email');
Route::post('/success/mail', [App\Http\Controllers\HomeController::class, 'successMail'])->name('success.email');

Route::get('/stripe/session', [App\Http\Controllers\StripeController::class, 'session'])->name('stripe.session');


Route::get('/services/{category}', [App\Http\Controllers\ServicesController::class, 'services'])->name('services.category');