<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\PhotoController;

Route::get("/health", HealthController::class);
Route::apiResource("tasks", TaskController::class);
Route::apiResource("photos", PhotoController::class)->only(["index", "store", "show", "destroy"]);
