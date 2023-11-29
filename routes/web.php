<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;

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



/* |--------------------------------------------------------------------------
| Auth and Landing Routes
|--------------------------------------------------------------------------
| */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/* |--------------------------------------------------------------------------
| Event routes
|--------------------------------------------------------------------------
| */

Route::resource('/events',EventController::class);

/* |--------------------------------------------------------------------------
| Review routes
|--------------------------------------------------------------------------
| */

Route::resource('/reviews',ReviewController::class);

