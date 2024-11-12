<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the guests.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    /**
     * Show the form for creating a new guest.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created guest in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:guests',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:200',
        ]);

        Guest::create($request->all());

        return redirect()->route('guests.index')->with('success', 'Guest created successfully!');
    }

    /**
     * Display the specified guest.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guest = Guest::findOrFail($id);
        return view('guests.show', compact('guest'));
    }


    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:guests',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:200',
        ]);

        $guest->update($request->all());

        return redirect()->route('guests.index')
            ->with('success', 'guest updated successfully');
    }

    /**
     * Remove the specified guest from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return redirect()->route('guests.index')->with('success', 'Guest deleted successfully!');
    }
}
