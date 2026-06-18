<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\VideoController;

Route::get("/health", HealthController::class);
Route::get("/echo", function () {
    return response()->json([
        "student_id" => "79016",
        "name" => "Omer Soyler",
        "timestamp" => now()->toISOString(),
        "message" => "Echo endpoint - WSD Project"
    ]);
});
Route::apiResource("tasks", TaskController::class);
Route::apiResource("photos", PhotoController::class)->only(["index", "store", "show", "destroy"]);
Route::apiResource("videos", VideoController::class)->only(["index", "show", "store"]);
