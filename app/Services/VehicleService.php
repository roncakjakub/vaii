<?php

namespace App\Services;

use App\Models\Vehicle;

class VehicleService
{
    /**
     * @param Vehicle $vehicle
     * @param array $data
     */
    public static function create(array $data)
    {
        actionWrapper(function () use ($data) {
            Vehicle::create($data);
        });
    }

    /**
     * @param Vehicle $vehicle
     * @param array $data
     */
    public static function update(Vehicle $vehicle, array $data)
    {
        actionWrapper(function () use ($vehicle,$data) {
            $vehicle->update($data);
        });
    }

    /**
     * @param Vehicle $vehicle
     * @param array $data
     */
    public static function delete(Vehicle $vehicle)
    {
        actionWrapper(function () use ($vehicle) {
            $vehicle->delete();
        });
    }

}
