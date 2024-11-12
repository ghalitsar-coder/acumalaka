<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
 

class PaymentController extends Controller
{
    /**
     * Display a listing of the payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with('reservation', 'staff')->get();
        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservations = Reservation::whereDoesntHave('payment')->get();
        // $reservations = Reservation::with('guest')->get();
        $staff = Staff::all();
        return view('payment.create', compact('reservations', 'staff'));
    }

    /**
     * Store a newly created payment in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_reservation' => 'required|exists:reservations,id_reservation',
            'id_staff' => 'required|exists:staff,id_staff',
            // 'amount' => 'required|decimal',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:50',
            'payment_status' => 'required|in:pending,completed,failed,success'
            
        ]);

        // try {
            // Your validation code here...
    
            $reservation = Reservation::findOrFail($request->id_reservation);
    
            // Create the payment
            Payment::create([
                'id_reservation' => $request->id_reservation,
                'id_staff' => $request->id_staff,
                'amount' => $reservation->total_price,
                'payment_date' => $request->payment_date,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_status
            ]);
    
            // dd('Payment created successfully!', $reservation->total_price);
    
        // } catch (\Exception $e) {
        //     dd('Error creating payment:', $e->getMessage());
        // }

        return redirect()->route('payment.index')->with('success', 'Payment created successfully!');
    }

    /**
     * Display the specified payment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::with('reservation', 'staff')->findOrFail($id);
        return view('payment.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $reservations = Reservation::all(); // Or add any conditions you need
        $staff = Staff::all();
        return view('payment.edit', compact('payment','reservations','staff'));
    }

    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'id_reservation' => [
                'required',
                Rule::exists('reservations', 'id_reservation'),
            ],
            'id_staff' => 'required|exists:staff,id_staff',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:50',
            'payment_status' => 'required|in:pending,completed,failed,success'
            
        ]);
    
        $payment = Payment::findOrFail($id);
        $payment->update($validated);

        return redirect()->route('payment.index')
        ->with('success', 'Payment updated successfully');
    }


    /**
     * Remove the specified payment from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payment.index')->with('success', 'Payment deleted successfully!');
    }
}
