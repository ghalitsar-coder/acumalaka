<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationService;
use App\Models\Service;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Carbon\Carbon; 

class ReservationController extends Controller
{
    /**
     * Display a listing of the reservations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
        $reservations = Reservation::with('guest', 'room', 'staff', 'service')
            ->get()
            ->map(function ($reservation) {
                // Format the check-in and check-out dates
                $reservation->formatted_check_in_date = Carbon::parse($reservation->check_in_date)->translatedFormat('d M Y');
                $reservation->formatted_check_out_date = Carbon::parse($reservation->check_out_date)->translatedFormat('d M Y');
                return $reservation;
            });
        return view('reservation.index', compact('reservations'));
}


    /**
     * Show the form for creating a new reservation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guests = Guest::with('reservations')->get();
        $services = Service::all();
        $rooms = Room::all() ;
        $staffs = Staff::all();  // Fetch all staff members

        return view('reservation.create', compact('guests', 'rooms', 'staffs','services'));  // Pass data to create view
    }

    /**
     * Store a newly created reservation in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'id_guest' => 'required|exists:guests,id_guest',
        'id_room' => 'required|exists:rooms,id_room',
        'id_staff' => 'required|exists:staff,id_staff',
        'id_service' => 'required|exists:services,id_service',
        'check_in_date' => 'required|date|after_or_equal:today',  // Ensure check-in date is valid and not in the past
        'check_out_date' => 'required|date|after:check_in_date',  // Ensure check-out date is after check-in date
    ], 
    [
        // Custom error messages for date validation
        'check_in_date.required' => 'The check-in date is required.',
        'check_in_date.after_or_equal' => 'The check-in date cannot be in the past.',
        'check_out_date.required' => 'The check-out date is required.',
        'check_out_date.after' => 'The check-out date must be after the check-in date.',
    ]);

    // Find the room based on the selected room ID
    $room = Room::find($request->id_room);
    $service = Service::find( $request->id_service);

    // Calculate the number of days between check-in and check-out dates
    $checkInDate = Carbon::parse($request->check_in_date);
    $checkOutDate = Carbon::parse($request->check_out_date);
    $days = $checkOutDate->diffInDays($checkInDate);

    // Calculate the total price based on the room's price per night and the number of days
    $totalPrice = ($room->price_per_night + $service->price) * $days;

    // Update the room status to 'occupied'
    $room->update(['status' => 'occupied']);

    
    // Create the reservation with the validated and calculated data
    $reservation = Reservation::create([
        'id_room' => $request->id_room,
        'id_guest' => $request->id_guest,
        'id_staff' => $request->id_staff,
        'id_service' => $request->id_service,
        'check_in_date' => $request->check_in_date,
        'check_out_date' => $request->check_out_date,
        'total_price' => $totalPrice,
    ]);

  

    return redirect()->route('reservation.index')->with('success', 'Reservation created successfully!');
}

    /**
     * Display the specified reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::with('guest', 'room', 'staff')->findOrFail($id);  // Fetch the reservation by ID
        return view('reservation.show', compact('reservation'));  // Pass data to show view
    }

    /**
     * Show the form for editing the specified reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);  // Fetch the reservation by ID
        $guests = Guest::with('reservations')->get();
        $services = Service::all();
        $rooms = Room::where('status', 'available')
                ->orWhere('id_room', $reservation->id_room)
                ->get();
        // $rooms = Room::all();
        $staffs = Staff::all();  // Fetch all staff members

        return view('reservation.edit', compact('reservation','guests', 'rooms', 'staffs','services'));  
    }

    /**
     * Update the specified reservation in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
         $validatedData = $request->validate([
        'id_guest' => 'required|exists:guests,id_guest',
        'id_room' => 'required|exists:rooms,id_room',
        'id_staff' => 'required|exists:staff,id_staff',
        'check_in_date' => 'required|date|after_or_equal:today',  // Ensure check-in date is valid and not in the past
        'check_out_date' => 'required|date|after:check_in_date',  // Ensure check-out date is after check-in date
    ], 
    [
        // Custom error messages for date validation
        'check_in_date.required' => 'The check-in date is required.',
        'check_in_date.after_or_equal' => 'The check-in date cannot be in the past.',
        'check_out_date.required' => 'The check-out date is required.',
        'check_out_date.after' => 'The check-out date must be after the check-in date.',
    ]);

     // Find the reservation by its ID
        $reservation = Reservation::findOrFail($id);

        // Find the reservation and update it
        $room = Room::find($request->id_room);
        $service = Service::find($request->id_service);
        
        
        // Calculate the number of days between check-in and check-out dates
        $checkInDate = Carbon::parse($request->check_in_date);
        $checkOutDate = Carbon::parse($request->check_out_date);
        $days = $checkOutDate->diffInDays($checkInDate);
    
        // Calculate the total price based on the room's price per night and the number of days
        $totalPrice = ($room->price_per_night + $service->price) * $days;

    
        if ($reservation->id_room != $request->id_room) {
            Room::where('id_room', $reservation->id_room)->update(['status' => 'available']);
            $room->update(['status' => 'occupied']);
        }
        // Create the reservation with the validated and calculated data
        $reservation->update([
            'id_room' => $request->id_room,
            'id_guest' => $request->id_guest,
            'id_staff' => $request->id_staff,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $totalPrice,
        ]);
        

        return redirect()->route('reservation.index')->with('success', 'Reservation updated successfully!');
    }

    /**
     * Remove the specified reservation from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        // Room::where('id_room', $reservation->id_room)->update(['status' => 'available']);
        $reservation->delete();

        return redirect()->route('reservation.index')->with('success', 'Reservation deleted successfully!');
    }


  

    public function reserve(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'id_room' => 'required|exists:rooms,id_room',
            'id_service' => 'required|exists:services,id_service',
        ]);
        
        try {
            // Get user's guest record
            $guest = Guest::where('user_id', Auth::id())->firstOrFail();
            
            // Get available staff member (you might want to customize this logic)
            $staff = Staff::first();
            
            $checkIn = Carbon::parse($validated['check_in_date']);
            $checkOut = Carbon::parse($validated['check_out_date']);
            
            
            // Check if room is available and not in maintenance
            $room = Room::findOrFail($validated['id_room']);

            if ($room->status === 'maintenance') {
                return back()->withInput()->with('error', 'Selected room is currently under maintenance.');
            }
            
            if ($this->isRoomAvailable($validated['id_room'], $checkIn, $checkOut)) {
                // Calculate total price based on room rate and service
                $service = Service::findOrFail($validated['id_service']);
                $nights = $checkIn->diffInDays($checkOut);
                $totalPrice = ($room->price_per_night * $nights) + $service->price;
                
                // Create the reservation
                $reservation = Reservation::create([
                    'id_guest' => $guest->id_guest,
                    'id_room' => $validated['id_room'],
                    'id_staff' => $staff->id_staff,
                    'id_service' => $validated['id_service'],
                    'check_in_date' => $checkIn,
                    'check_out_date' => $checkOut,
                    'total_price' => $totalPrice,
                    'status' => 'confirmed'
                ]);
                // dd($request->all());

                // Update room status
                $room->update(['status' => 'occupied']);

                return redirect()
                ->route('user-payments.create', ['reservation' => $reservation->id_reservation])
                ->with('success', 'Reservation created! Please complete your payment.');
            }

            return back()
                ->withInput()
                ->with('error', 'Selected room is not available for these dates.');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'There was a problem creating your reservation: ' . $e->getMessage());
        }
    }

    private function isRoomAvailable($roomId, $checkIn, $checkOut)
    {
        // Check existing reservations
        $existingReservation = Reservation::where('id_room', $roomId)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in_date', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in_date', '<=', $checkIn)
                            ->where('check_out_date', '>=', $checkOut);
                    });
            })
            ->whereIn('status', ['confirmed', 'checked_in'])
            ->exists();

        // Check room status
        $room = Room::find($roomId);
        $roomUnavailable = in_array($room->status, ['occupied', 'maintenance', 'cleaning']);

        return !$existingReservation && !$roomUnavailable;
    }

    // public function show($id)
    // {
    //     $reservation = Reservation::with([
    //         'guest' => function($query) {
    //             $query->select('id_guest', 'first_name', 'last_name', 'email', 'phone');
    //         },
    //         'room' => function($query) {
    //             $query->select('id_room', 'room_number', 'room_type', 'price_per_night');
    //         },
    //         'service' => function($query) {
    //             $query->select('id_service', 'service_type', 'price');
    //         },
    //         'staff' => function($query) {
    //             $query->select('id_staff', 'first_name', 'last_name', 'position');
    //         }
    //     ])->findOrFail($id);

    //     return view('reservations.show', compact('reservation'));
    // }

    public function detailReservation()
    {
        return view('reservasi.reservasi');
    }
}
