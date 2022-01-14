<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicles\StoreVehicleFormRequest;
use App\Http\Requests\Vehicles\UpdateVehicleFormRequest;
use App\Models\Course;
use App\Models\LicenceType;
use App\Models\Vehicle;
use App\Services\VehicleService;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vozidla.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $licenceTypes = LicenceType::all();
        return view('vozidla.create', compact('licenceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleFormRequest $request)
    {
        VehicleService::create($request->validated());
        return redirect()->route('admin.vehicles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $licenceTypes = LicenceType::all();
        return view('vozidla.edit', compact('vehicle','licenceTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleFormRequest $request, Vehicle $vehicle)
    {
        VehicleService::update($vehicle, $request->validated());
        return redirect()->route('admin.vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        VehicleService::delete($vehicle);
    }
}
