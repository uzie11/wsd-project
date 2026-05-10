<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\TaskController;

Route::get("/health", HealthController::class);

Route::prefix("79016/v1")->group(function () {
    Route::apiResource("tasks", TaskController::class);
});
use App\Http\Controllers\Api\RestaurantController;

Route::prefix('79016/v1')->group(function () {
    Route::get('restaurants/nearby', [RestaurantController::class, 'nearby']);
    Route::apiResource('restaurants', RestaurantController::class);
});
