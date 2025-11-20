<?php

namespace Modules\Timesheet\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Timesheet\Entities\Timesheet;
use App\Models\Employee;
use App\Models\Proposal;
use Modules\Serviceused\Entities\Serviceused;
use Carbon\Carbon;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $timesheets = Timesheet::with(['employee', 'serviceused.proposal'])->get();
        return view('timesheet::index', compact('timesheets'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $employees = Employee::all(); // dari muc__hrd__miniproject
        $proposals = Proposal::all(); // dari muc__marketing__miniproject
        $services  = Serviceused::all(); // dari modul ServiceUsed

        return view('timesheet::create', compact('employees', 'proposals', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'proposal_id' => 'required',
            'serviceused_id' => 'required',
            'timestart' => 'required|date_format:Y-m-d H:i',
            'timefinish' => 'required|date_format:Y-m-d H:i',
        ]);

        $start = Carbon::parse($request->timestart);
        $finish = Carbon::parse($request->timefinish);
        $totalJam = $finish->diffInMinutes($start) / 60;

        Timesheet::create([
            'employee_id' => $request->employee_id,
            'proposal_id' => $request->proposal_id,
            'serviceused_id' => $request->serviceused_id,
            'timestart' => $request->timestart,
            'timefinish' => $request->timefinish,
            'total_jam' => $totalJam,
        ]);

        return redirect()->route('timesheet.index')->with('success', 'Timesheet berhasil disimpan.');
    }

    public function show($id)
    {
        $timesheet = Timesheet::with(['employee', 'proposal', 'serviceused'])->findOrFail($id);
        return view('timesheet::show', compact('timesheet'));
    }

    public function edit($id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $employees = Employee::all();
        $proposals = Proposal::all();
        $services  = Serviceused::all();

        return view('timesheet::edit', compact('timesheet', 'employees', 'proposals', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required',
            'proposal_id' => 'required',
            'serviceused_id' => 'required',
            'timestart' => 'required|date_format:Y-m-d H:i',
            'timefinish' => 'required|date_format:Y-m-d H:i',
        ]);

        $start = Carbon::parse($request->timestart);
        $finish = Carbon::parse($request->timefinish);
        $totalJam = $finish->diffInMinutes($start) / 60;

        $timesheet = Timesheet::findOrFail($id);
        $timesheet->update([
            'employee_id' => $request->employee_id,
            'proposal_id' => $request->proposal_id,
            'serviceused_id' => $request->serviceused_id,
            'timestart' => $request->timestart,
            'timefinish' => $request->timefinish,
            'total_jam' => $totalJam,
        ]);

        return redirect()->route('timesheet.index')->with('success', 'Timesheet berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $timesheet->delete();

        return redirect()->route('timesheet.index')->with('success', 'Timesheet berhasil dihapus.');
    }
}

