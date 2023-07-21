<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Events\EventRequest;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class EventController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param EventRequest $request
     * @return JsonResponse
     */
    public function __invoke(EventRequest $request): JsonResponse
    {
        $events = Event::query()
            ->with('team')
            ->when(isset($request->date_from, $request->date_to), function ($query) use ($request) {
                $query->where('starting_date', '>=', Carbon::parse($request->date_from)->startOfDay());
                $query->orWhere('ending_date', '<=', Carbon::parse($request->date_to)->endOfDay());
            })
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
                'message' => 'Success fetching Events',
                'data' => $events,
            ], SymfonyResponse::HTTP_OK);
    }
}
