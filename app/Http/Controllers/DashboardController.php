<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;
use App\Charts\TotalUsageChart;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $chart = new TotalUsageChart;

        return view('pages.dashboard.home', [
            'chart' => $chart,
        ]);
    }
}
