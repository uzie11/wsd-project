<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\TaskController;

Route::get("/health", HealthController::class);
Route::apiResource("tasks", TaskController::class);
