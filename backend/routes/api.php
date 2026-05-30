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
use App\Http\Controllers\Api\PhotoController;
Route::prefix('79016/v1')->group(function () {
    Route::apiResource('photos', PhotoController::class)
        ->only(['index', 'store', 'show', 'destroy']);
});

Route::prefix('79016/v1')->group(function () {
    Route::post('users/{id}/follow', [App\Http\Controllers\Api\FollowController::class, 'follow']);
    Route::delete('users/{id}/follow', [App\Http\Controllers\Api\FollowController::class, 'unfollow']);
    Route::get('feed', [App\Http\Controllers\Api\FeedController::class, 'index']);
});

Route::prefix('79016/v1')->group(function () {
    Route::apiResource('videos', App\Http\Controllers\Api\VideoController::class)
        ->only(['index', 'show', 'store']);
    Route::get('recommendations', [App\Http\Controllers\Api\RecommendationController::class, 'index']);
    Route::get('continue-watching', [App\Http\Controllers\Api\WatchHistoryController::class, 'continueWatching']);
});
