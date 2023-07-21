<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateUserFcmToken extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            auth()->user()->update(['fcm_token' => $request->token]);

            return response()->json([
                'message' => 'Success updating FCM token',
                'data' => null,
            ], 200);
        } catch (Exception $exception) {
            info($exception);

            return response()->json([
                'message' => 'Error updating FCM token',
                'data' => null,
            ], 500);
        }
    }
}
