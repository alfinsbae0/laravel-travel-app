<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index()
    {
        $schedules = Schedule::with('destination')->get();
        $destinations = Destination::all();
        return view('admin.schedule.index', compact('schedules', 'destinations'));
    }

    public function store(Request $request)
    {
        $data = [
            'destination_id' => $request->destination_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'price' => $request->price,
        ];

        Schedule::create($data);

        return back()->with('Success');
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $schedule = Schedule::findOrFail($id);

        $departure_time = date('h:i A', strtotime($request->departure_time));
        $arrival_time = date('h:i A', strtotime($request->arrival_time));

        $data = [
            'departure_time' => $departure_time,
            'arrival_time' => $arrival_time,
            'price' => $request->price,
        ];

        $schedule->update($data);

        return back()->with('Success Update');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $schedule = Schedule::findOrFail($id);

        $schedule->delete();

        return back()->with('Success');
    }
}
