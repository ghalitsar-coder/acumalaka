<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the staff members.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new staff member.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created staff member in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:staff',
            'phone' => 'required|string|max:20',
            'hire_date' => 'required|date',
        ]);

        Staff::create($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff member created successfully!');
    }

    /**
     * Display the specified staff member.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:staff',
            'phone' => 'required|string|max:20',
            'hire_date' => 'required|date',
        ]);

        $staff->update($request->all());

        return redirect()->route('staff.index')->with('success', 'staff created successfully!');
    }

    /**
     * Remove the specified staff member from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully!');
    }
}
