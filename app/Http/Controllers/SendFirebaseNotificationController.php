<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendFirebaseNotificationRequest;
use App\Models\User;
use App\Notifications\SendFirebaseNotification;
use Illuminate\Support\Facades\Notification;

class SendFirebaseNotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param SendFirebaseNotificationRequest $request
     */
    public function __invoke(SendFirebaseNotificationRequest $request)
    {
        try {
            $fcmTokens = User::query()
                ->whereNotNull('fcm_token')
                ->pluck('fcm_token')
                ->toArray();

            Notification::send(null,new SendFirebaseNotification($request->title, $request->message, $fcmTokens));

            return redirect()->back()->with('success', 'Success sending Notification.');

        } catch (\Exception $exception) {
            info($exception);
            return redirect()->back()->with('error', 'Error sending notification.');
        }
    }
}
