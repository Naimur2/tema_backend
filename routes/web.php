<?php

use App\Http\Controllers\AppUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\SendFirebaseNotificationController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UpdateUserFcmToken;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return redirect()->route('home');
// });

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
Route::get('/', function () {
    return redirect('/dashboard');
})->name('home');

Route::post('all-events', \App\Http\Controllers\Api\EventController::class)->name('all.events');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('events', EventController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('folders', FolderController::class);
    Route::resource('files', FileController::class);
    Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::view('notifications', 'send-notifications')->name('notifications.index');
    Route::post('notifications', SendFirebaseNotificationController::class)->name('notifications.store');
    Route::patch('users/fcm-token/update', UpdateUserFcmToken::class)->name('fcm.update');

});

// Route::get('/foo', function () {
//     try {
//         Artisan::call('storage:link');
//     } catch (\Throwable $th) {
//         dd($th->getMessage());
//     }
// });