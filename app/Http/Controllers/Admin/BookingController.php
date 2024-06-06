<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Destination;
use App\Models\Schedule;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $data = Bookings::with('user', 'schedule')->get();

        return view('admin.booking.index', compact('data'));
    }

    public function create()
    {
        $data = Bookings::with('user', 'schedule')->get();
        $schedules = Schedule::all();

        return view('pages.booking_user', compact('data', 'schedules'));
    }

    public function store(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'schedule_id' => $request->schedule_id,
            'booking_date' => $request->booking_date,
            'price' => $request->price,
            'qty' => $request->qty,
        ];

        // dump($data);

        Bookings::create($data);
        return redirect(route('user.booking.create'))->with('Success');
    }
}
