<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/orders', [OrderController::class, 'store']);
Route::post('track-order', [OrderController::class, 'trackOrder']);

//authentication
Route::post('login', [AuthController::class, 'loginUser']);
Route::post('register', [AuthController::class, 'registerUser']);
Route::post('forgot-password', [AuthController::class, 'forgotpasswordsendOtp']);
Route::post('updatePassword/{otp}', [AuthController::class, 'updatePassword']);
//
Route::get('/countries', [OrderController::class, 'getCountries']);
Route::get('/services/{country_id}', [OrderController::class, 'getServices']);
Route::get('/categories/{service_id}', [OrderController::class, 'getCategories']);

Route::get('/dropdown-data/{country_id}', [OrderController::class, 'getDropdownData']);
