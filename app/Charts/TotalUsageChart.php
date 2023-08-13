<?php

namespace App\Charts;

use App\Models\Usage;
use App\Models\Vehicle;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class TotalUsageChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $vehicleTypes = Vehicle::all(); // Get all vehicle types

        $data = [];

        foreach ($vehicleTypes as $vehicleType) {
            $approvedCount = Usage::whereHas('vehicle', function ($query) use ($vehicleType) {
                $query->where('type', $vehicleType->type);
            })
                ->where('approved_by_head_mine', '=',  '1')
                ->where('approved_by_head_office', '=', '1')
                ->count();

            $data[$vehicleType->type === 0 ? 'Kendaraan Orang' : 'Kendaraan Barang'] = $approvedCount;
        }

        $this->labels(array_keys($data));
        $this->dataset('Total Kendaraan Yang Digunakan', 'bar', array_values($data));
    }
}
