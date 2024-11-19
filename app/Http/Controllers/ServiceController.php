<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created service in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_type' => 'required|in:standard,luxury,comfort',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric:1',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_type' => 'required|in:standard,luxury,comfort',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric:1',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }
    /**
     * Remove the specified service from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}
