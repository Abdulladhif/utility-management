<?php
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeterReadingController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/meter-readings', [MeterReadingController::class, 'index']);
    Route::post('/meter-readings', [MeterReadingController::class, 'store']);
    Route::get('/meter-readings/{id}', [MeterReadingController::class, 'show']);
    Route::put('/meter-readings/{id}', [MeterReadingController::class, 'update']);
    Route::delete('/meter-readings/{id}', [MeterReadingController::class, 'destroy']);
    Route::get('/analytics', [AnalyticsController::class, 'getAnalytics']);
});
