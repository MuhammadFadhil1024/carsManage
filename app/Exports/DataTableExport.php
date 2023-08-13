<?php

namespace App\Exports;

use App\Models\Usage;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;


class DataTableExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function view(): View
    {
        $usages = Usage::with('vehicle', 'driver')
            ->where('approved_by_head_mine', '=',  '1')
            ->Where('approved_by_head_office', '=', '1')->get();
        // dd($usages);
        return view('pages.dashboard.monitor.partials.report', ['usages' => $usages]);
    }
}
