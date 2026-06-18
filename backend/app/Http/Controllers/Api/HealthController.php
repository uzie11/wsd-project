<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
class HealthController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            "status" => "ok",
            "service" => "backend",
            "student_id" => "79016",
            "name" => "Omer Soyler",
            "timestamp" => now()->toISOString()
        ], 200);
    }
}
