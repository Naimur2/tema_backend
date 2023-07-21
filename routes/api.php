<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\FolderController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SendFirebaseNotificationController;
use App\Http\Controllers\UpdateUserFcmToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('events', EventController::class);
    Route::get('teams', TeamController::class);
    Route::apiResource('folders', FolderController::class)->only(['index', 'show']);
    Route::post('logout', LogoutController::class);
    Route::patch('users/fcm-token/update', UpdateUserFcmToken::class);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
