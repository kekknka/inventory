<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('login', [PublicController::class, 'login'])->name('login');

Route::post('log_in', [LoginController::class, 'login'])->name('log_in');

Route::middleware(['token'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('orders', [OrderController::class, 'orders'])->name('order.get');
});
