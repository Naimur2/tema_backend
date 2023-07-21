<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class TeamController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $events = Team::query()
            ->orderBy('score', 'desc')
            ->get();

        if (0 === $events->count()) {
            return response()
                ->json([
                    'message' => 'No data to show',
                    'data' => null,
                ], SymfonyResponse::HTTP_NOT_FOUND);
        }

        return response()
            ->json([
                'message' => 'Success fetching Teams',
                'data' => $events,
            ], SymfonyResponse::HTTP_OK);
    }
}
