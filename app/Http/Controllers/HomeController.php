<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Destinations;
use App\Models\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        $schedules = Schedule::all();
        return view('pages.home', compact('destinations', 'schedules'));
    }
}
