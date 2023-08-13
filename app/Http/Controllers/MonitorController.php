<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use Illuminate\Http\Request;
use App\Exports\DataTableExport;
use App\Exports\ReportByYear;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MonitorController extends Controller
{
    public function index()
    {

        $usages = Usage::with('vehicle')
            ->where('approved_by_head_mine', '=',  '0')
            ->orWhere('approved_by_head_office', '=', '0')->get();
        // dd($usages);
        return view('pages.dashboard.monitor.waiting', ['usages' => $usages]);
    }

    public function edit(int $id)
    {
        $usage = Usage::find($id);

        return view('pages.dashboard.monitor.edit', [
            'usage' => $usage
        ]);
    }

    public function updateHeadOffice(Request $request, int $id)
    {
        $usage = Usage::find($id);
        $data = $request->all();
        $data['approved_by_head_office'] = $request->approved_by_head_office;

        $usage->update($data);

        return redirect()->action([MonitorController::class, 'index'])->with('success', 'success update record');
    }

    public function updateHeadMine(Request $request, int $id)
    {
        // dd($usage);
        $usage = Usage::find($id);
        $data = $request->all();
        $data['approved_by_head_mine'] = $request->approved_by_head_mine;

        $usage->update($data);

        return redirect()->action([MonitorController::class, 'index'])->with('success', 'success update record');
    }

    public function approved()
    {
        $years = Usage::select(DB::raw('YEAR(usage_date) as year'))
            ->distinct()
            ->get();

        $usages = Usage::with('vehicle')
            ->where('approved_by_head_mine', '=',  '1')
            ->Where('approved_by_head_office', '=', '1')->get();
        // dd($usages);
        return view('pages.dashboard.monitor.approved', ['usages' => $usages, 'year' => $years]);
    }

    public function exportAllReport()
    {
        return Excel::download(new DataTableExport, 'allreports.xlsx');
    }

    public function exportByYear(Request $request)
    {
        // dd($request);
        $year = $request->input('year');

        if ($year) {
            return Excel::download(new ReportByYear($year), 'reportsyears.xlsx');
        } else {
            return redirect()->back()->with('failed', 'you must select year');
        }
    }
}
