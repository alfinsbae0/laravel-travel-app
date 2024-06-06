<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;


class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::get();
        return view('admin.destination.index', compact('destinations'));
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'destination' => $request->destination,
                'distance' => $request->distance,
            ];

            Destination::create($data);
            // dump($data);
            return back()->with('Success Adding Destinations');
        } catch (\Throwable $th) {
            error_log($th);
        }
    }

    public function update(Request $request)
    {
        try {
            $id = $request->id;

            $destination = Destination::findOrFail($id);

            $data = [
                'destination' => $request->destination,
                'distance' => $request->distance,
            ];

            $destination->update($data);

            return back()->with('success', 'Success Updating Destination');
        } catch (\Throwable $th) {
            error_log($th);
            return back()->withErrors('Error updating destination');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            $destination = Destination::findOrFail($id);

            $destination->delete();

            return back()->with('success', 'Success Deleting Destination');
        } catch (\Throwable $th) {
            error_log($th);
            return back()->withErrors('Error deleting destination');
        }
    }
}
