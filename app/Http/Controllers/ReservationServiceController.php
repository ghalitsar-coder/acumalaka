<?php

namespace App\Http\Controllers;

use App\Models\ReservationService;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;

class ReservationServiceController extends Controller
{
    /**
     * Display a listing of the reservation services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservationServices = ReservationService::with('reservation', 'service')->get();
        return view('reservation_services.index', compact('reservationServices'));
    }

    /**
     * Show the form for creating a new reservation service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservations = Reservation::all();
        $services = Service::all();
        return view('reservation_services.create', compact('reservations', 'services'));
    }

    /**
     * Store a newly created reservation service in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_reservation' => 'required|exists:reservations,id_reservation',
            'id_service' => 'required|exists:services,id_service',
            'quantity' => 'required|integer',
            'total_price' => 'required|decimal',
        ]);

        ReservationService::create($request->all());

        return redirect()->route('reservation_services.index')->with('success', 'Reservation service added successfully!');
    }

    /**
     * Display the specified reservation service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservationService = ReservationService::with('reservation', 'service')->findOrFail($id);
        return view('reservation_services.show', compact('reservationService'));
    }

    /**
     * Remove the specified reservation service from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservationService = ReservationService::findOrFail($id);
        $reservationService->delete();

        return redirect()->route('reservation_services.index')->with('success', 'Reservation service deleted successfully!');
    }
}
