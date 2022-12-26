<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\ExceptionController;
use App\Http\Controllers\Api\V1\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('tokennotfound', [ExceptionController::class, 'not_access_token'])->name('nottoken');
Route::post('login', [LoginController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function(){
    Route::apiResource('v1/products', ProductController::class);
    Route::apiResource('v1/orders', OrderController::class)->only(['index', 'store', 'show']);
});

