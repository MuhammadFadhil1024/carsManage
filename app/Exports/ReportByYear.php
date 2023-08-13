<?php

namespace App\Exports;

use App\Models\Usage;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportByYear implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $year;
    public function __construct($year)
    {
        $this->year = $year;
    }

    public function view(): View
    {
        $usages = Usage::with('vehicle', 'driver')
            ->where('approved_by_head_mine', '=',  '1')
            ->where('approved_by_head_office', '=', '1')
            ->whereYear('usage_date', $this->year) // Filter by year
            ->get();

        return view('pages.dashboard.monitor.partials.report', ['usages' => $usages]);
    }
}
