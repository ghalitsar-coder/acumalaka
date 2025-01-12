<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Http\Request;



class RoomController extends Controller
{
     public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

   public function landing()
{
    $roomTypes = ['single', 'double', 'queen', 'king'];

    // Query untuk mendapatkan room_type yang ada di tabel rooms
    $rooms = \DB::table('rooms')
        ->select('room_type', \DB::raw('MIN(image) as image'))
        ->whereIn('room_type', $roomTypes)
        ->groupBy('room_type')
        ->get();

    // Filter hanya room_type yang memiliki data
    $filteredRooms = $rooms->filter(function ($room) use ($roomTypes) {
        return in_array($room->room_type, $roomTypes);
    });
    // $rooms = Room::select('room_type', 'image')->distinct()->get();
    // Kirim data ke view
    return view('landing.index', ['rooms' => $filteredRooms]);
}

public function roomDetails($room_type)
{
    // Fetch rooms of the selected type
    $rooms = Room::where('room_type', $room_type)
                 ->where('status', 'available')
                 ->get();

    return view('rooms.details', compact('rooms', 'room_type'));
}

public function showRoomForm(Request $request, $room_type)
{
    $guest = auth()->user()->guest; // Assuming `guest()` is a hasOne or belongsTo relationship

    // Now, you can access the id_guest from the $guest object
    if ($guest) {
        $id_guest = $guest->id_guest;
        // Use $id_guest as needed in your code
    } else {
        // Handle the case where no guest is associated with the user
        return response()->json(['error' => 'Guest not found'], 404);
    }

    $rooms = Room::where('room_type', $room_type)->get(); // Fetch rooms of this type
    $services = Service::all(); // Fetch all services
    $hasPendingReservation = Reservation::where('id_guest', $id_guest)
    ->whereNull('check_out_date')
    ->exists(); 
    // Check if user has pending reservations
    return view('rooms.details', compact('room_type', 'rooms', 'services', 'hasPendingReservation'));
}

public function reserveRoom(Request $request)
{
    $request->validate([
        'id_room' => 'required|exists:rooms,id',
        'services' => 'array',
        'services.*' => 'exists:services,id',
    ]);

    $hasPendingReservation = Reservation::where('id_guest', auth()->id())
        ->whereNull('check_out_date')
        ->exists();

    if ($hasPendingReservation) {
        return back()->withErrors(['error' => 'You already have an ongoing reservation. Please check out before reserving a new room.']);
    }

    // Create a new reservation
    $reservation = Reservation::create([
        'user_id' => auth()->id(),
        'id_room' => $request->room_id,
        'status' => 'reserved',
    ]);

    // Attach selected services
    if ($request->has('services')) {
        $reservation->services()->sync($request->services);
    }

    return redirect()->back()->with('success', 'Room reserved successfully!');
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
    private function updateReservationsTotalPrice(Room $room)
{
    // Step 1: Get all reservations for the updated room
    $reservations = Reservation::where('room_id', $room->id_room)->get();

    // Step 2: Loop through each reservation and update its total_price
    foreach ($reservations as $reservation) {
        // Calculate the number of nights between check-in and check-out dates
        $checkIn = \Carbon\Carbon::parse($reservation->check_in_date);
        $checkOut = \Carbon\Carbon::parse($reservation->check_out_date);
        $nights = $checkIn->diffInDays($checkOut);

        // Step 3: Calculate the new total price based on updated room price
        $newTotalPrice = $nights * $room->price_per_night;

        // Step 4: Update the reservation's total_price
        $reservation->update(['total_price' => $newTotalPrice]);
    }
}

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully');
    }
}
