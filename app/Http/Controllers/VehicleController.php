<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        // dd($vehicles);
        return view('pages.dashboard.vehicle.index', ['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.dashboard.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        // dd($request);

        $data = $request->all();

        if ($request->is_company_owned === "true") {
            $data['is_company_owned'] = true;
        } else {
            $data['is_company_owned'] = false;
        }

        $date = Carbon::createFromFormat('d/m/Y', $request->service_schedule)->format('Y-m-d');
        // dd($date);

        $data['service_schedule'] = $date;

        Vehicle::create($data);

        return redirect()->route('dashboard.vehicle.index')->with('success', 'success add new record');
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
    public function edit(Vehicle $vehicle)
    {
        return view('pages.dashboard.vehicle.edit', ['vehicle' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        // dd($request);
        $data = $request->all();

        if ($request->is_company_owned === "true") {
            $data['is_company_owned'] = true;
        } else {
            $data['is_company_owned'] = false;
        }

        if ($request->service_schedule == $vehicle->service_schedule) {
            $data['service_schedule'] = $vehicle->service_schedule;
        } else {
            $date = Carbon::createFromFormat('d/m/Y', $request->service_schedule)->format('Y-m-d');
            $data['service_schedule'] = $date;
        }


        $vehicle->update($data);

        return redirect()->route('dashboard.vehicle.index')->with('success', 'success update record');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->back()->with('success', 'success delete record');
    }
}
