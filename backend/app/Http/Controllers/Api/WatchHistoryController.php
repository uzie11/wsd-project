<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WatchHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class WatchHistoryController extends Controller
{
    public function continueWatching(): JsonResponse
    {
        $userId = 1;
        $cacheKey = 'continue_watching:' . $userId;

        $history = Cache::remember($cacheKey, 60, function () use ($userId) {
            return WatchHistory::query()
                ->with('video')
                ->where('user_id', $userId)
                ->where('completed', false)
                ->orderByDesc('watched_at')
                ->limit(10)
                ->get();
        });

        return response()->json(['data' => $history], 200);
    }
}
