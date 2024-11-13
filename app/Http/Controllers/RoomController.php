<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;



class RoomController extends Controller
{
     public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
          // Validate the incoming data
        $validated = $request->validate([
            'room_number' => 'required|string|max:10|unique:rooms',
            'room_type' => 'required|in:single,double,queen,king',
        ]);

        // Automatically set the capacity and price based on room type
        $roomDetails = $this->getRoomDetails($validated['room_type']);

        // Merge the automatically set values with the validated data
        $validated = array_merge($validated, $roomDetails);

        // Create the room with the merged data
        Room::create($validated);
        return redirect()->route('rooms.index')->with('success', 'Room created successfully');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }
    private function getRoomDetails($roomType)
    {   
    switch ($roomType) {
        case 'single':
            return ['capacity' => 1, 'price_per_night' => 100];
        case 'double':
            return ['capacity' => 2, 'price_per_night' => 150];
        case 'queen':
            return ['capacity' => 3, 'price_per_night' => 200];
        case 'king':
            return ['capacity' => 4, 'price_per_night' => 250];
        default:
            return ['capacity' => 1, 'price_per_night' => 100]; // Fallback if something goes wrong
    }
}

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'room_number' => 'required|string|max:10|unique:rooms,room_number,'.$room->id_room.',id_room',
            'room_type' => 'required|string|max:50',
            'status' => 'required|in:available,occupied,maintenance,cleaning'
        ]);

   

        // Automatically set the capacity and price based on room type
        $roomDetails = $this->getRoomDetails($validated['room_type']);

        // Merge the automatically set values with the validated data
        $validated = array_merge($validated, $roomDetails);

        // Create the room with the merged data

        $room->update($validated);
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully');
    }
}
