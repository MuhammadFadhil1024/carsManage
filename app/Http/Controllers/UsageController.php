<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Usage;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Requests\UsageRequest;
use App\Http\Requests\VehicleRequest;
use App\Models\Driver;
use App\Models\User;

class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usages = Usage::with(['vehicle', 'driver'])->get();
        // dd($usages);

        return view('pages.dashboard.usage.index', ['usages' => $usages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::select('id', 'vehicles_number')->get();
        // dd($vehicles);

        $drivers = Driver::where('status', 0)->get();
        $headOffices = User::where('roles', 'headOffice')->get();
        $headMines = User::where('roles', 'headMine')->get();
        // dd($drivers);

        return view('pages.dashboard.usage.create', [
            'vehicles' => $vehicles,
            'headMines' => $headMines,
            'headOffices' => $headOffices,
            'drivers' => $drivers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsageRequest $request)
    {
        // dd($request);
        $data = $request->all();

        // update status driver
        $driver = Driver::find($request->driver_id);
        $driver->status = 1;
        $driver->save();

        $usage_date = Carbon::createFromFormat('d/m/Y', $request->usage_date)->format('Y-m-d');
        $end_of_usage_date = Carbon::createFromFormat('d/m/Y', $request->end_of_usage_date)->format('Y-m-d');

        $data['usage_date'] = $usage_date;
        $data['end_of_usage_date'] = $end_of_usage_date;

        Usage::create($data);

        return redirect()->route('dashboard.usage.index')->with('success', 'success add new record');
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
    public function edit(Usage $usage)
    {
        $vehicles = Vehicle::select('id', 'vehicles_number')->get();
        $drivers = Driver::where('status', 0)->get();
        $headOffices = User::where('roles', 'headOffice')->get();
        $headMines = User::where('roles', 'headMine')->get();

        return view('pages.dashboard.usage.edit', [
            'usage' => $usage,
            'vehicles' => $vehicles,
            'drivers' => $drivers,
            'headMines' => $headMines,
            'headOffices' => $headOffices,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsageRequest $request, Usage $usage)
    {
        $data = $request->all();
        // dd($request)

        if ($request->usage_date == $usage->usage_date) {
            $data['usage_date'] = $usage->usage_date;
        } else {
            $date = Carbon::createFromFormat('d/m/Y', $request->usage_date)->format('Y-m-d');
            $data['usage_date'] = $date;
        }

        if ($request->end_of_usage_date == $usage->end_of_usage_date) {
            $data['end_of_usage_date'] = $usage->end_of_usage_date;
        } else {
            $date = Carbon::createFromFormat('d/m/Y', $request->end_of_usage_date)->format('Y-m-d');
            $data['end_of_usage_date'] = $date;
        }

        if ($request->driver_id == $usage->driver_id) {
            $driver = Driver::find($request->driver_id);
            $driver->status = $usage->driver_id;
            $driver->save();
        } else {
            $driver = Driver::find($request->driver_id);
            $driver->status = 1;
            $driver->save();

            $oldDriver = Driver::find($usage->driver_id);
            $oldDriver->status = 0;
            $oldDriver->save();
        }

        $usage->update($data);

        return redirect()->route('dashboard.usage.index')->with('success', 'success update record');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usage $usage)
    {
        $usage->delete();

        return redirect()->back()->with('success', 'success delete record');
    }
}
