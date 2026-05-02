<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rute Publik
Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login',    [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// Rute Terproteksi (Butuh JWT Token)
Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/logout',   [AuthController::class, 'logout']);
    Route::post('/refresh',  [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::put('/update-profile', [AuthController::class, 'updateProfile']);
    Route::delete('/delete-account', [AuthController::class, 'deleteAccount']);
});

// Contoh route API publik lainnya
Route::get('/ping', function() {
    return response()->json(['message' => 'pong', 'status' => 'API is running']);
});
