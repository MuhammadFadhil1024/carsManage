<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();

        return view('pages.dashboard.driver.index', [
            'drivers' => $drivers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.driver.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverRequest $request)
    {
        // dd($request);
        $data = $request->all();
        Driver::create($data);

        return redirect()->route('dashboard.driver.index')->with('success', 'success add new record');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        // dd($driver);

        return view('pages.dashboard.driver.edit', ['driver' => $driver]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverRequest $request, Driver $driver)
    {
        // dd($driver);
        $data = $request->all();
        $driver->update($data);

        return redirect()->route('dashboard.driver.index')->with('success', 'success add new record');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        // dd($driver);
        $driver->delete();
        return redirect()->back()->with('success', 'success delete record');
    }
}
