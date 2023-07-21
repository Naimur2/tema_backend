<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Team;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard')->with([
            'eventsCount' => Event::all()->count(), 
            'teamsCount' => Team::all()->count(),
            'userCount' => User::where('userType', 1)->get()->count(),
        ]);
    }
}
