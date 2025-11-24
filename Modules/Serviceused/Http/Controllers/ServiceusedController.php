<?php

namespace Modules\Serviceused\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\marketing\ServiceusedModel as Serviceused;
use App\Models\hrd\EmployeesModel as Employee;
use Modules\Timesheet\Entities\Timesheet;
use App\Models\marketing\ProposalModel as Proposal;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceusedController extends Controller
{
    // ============================
    // TAMPILKAN LIST
    // ============================
    public function index()
    {
        $services = Serviceused::with('proposal')->get();

        foreach ($services as $service) {
            $employeeId = DB::connection('muc__activity__miniproject')
                ->table('timesheet')
                ->where('serviceused_id', $service->id)
                ->value('employee_id');

            $employeeName = null;
            if ($employeeId) {
                $employeeName = DB::connection('mysql_hrd')
                    ->table('employees')
                    ->where('id', $employeeId)
                    ->value('fullname');
            }

            $service->employee_name = $employeeName ?? '-';
        }

        return view('serviceused::index', compact('services'));
    }

    // ============================
    // TAMPILKAN FORM CREATE
    // ============================
    public function create()
    {
        $proposals = Proposal::all();
        $employees = Employee::all();

        return view('serviceused::create', compact('proposals', 'employees'));
    }

    // ============================
    // SIMPAN DATA BARU
    // ============================
    public function store(Request $request)
    {
        $request->validate([
            'proposal_id' => 'required|exists:proposal,id',
            'employee_id' => 'required|exists:mysql_hrd.employees,id',
            'service_name' => 'required',
            'status' => 'required|in:pending,ongoing,done',
        ]);


        // Simpan serviceused
        $service = Serviceused::create($request->only([
            'proposal_id',
            'employee_id',
            'service_name',
            'status'
        ]));

        // Tambahkan timesheet otomatis
        Timesheet::create([
            'date' => Carbon::now()->format('Y-m-d'),
            'employee_id' => $request->employee_id,
            'serviceused_id' => $service->id,
            'timestart' => Carbon::now()->format('H:i:s'),
            'timefinish' => Carbon::now()->addHours(1)->format('H:i:s'),
            'description' => 'Auto-generated from serviceused creation'
        ]);

        return redirect()->route('serviceused.index')->with('success', 'Serviceused & Timesheet created successfully.');
    }

    // ============================
    // TAMPILKAN FORM EDIT
    // ============================
    public function edit($id)
    {
        $service = Serviceused::with('proposal')->findOrFail($id);
        $employees = Employee::all();

        // Ambil employee_id dari timesheet
        $employeeId = DB::connection('muc__activity__miniproject')
            ->table('timesheet')
            ->where('serviceused_id', $service->id)
            ->value('employee_id');

        $service->employee_id = $employeeId;
        $service->employee_name = $employees->firstWhere('id', $employeeId)?->fullname ?? '-';

        return view('serviceused::edit', compact('service', 'employees'));
    }


    // ============================
    // UPDATE DATA
    // ============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:mysql_hrd.employees,id',
            'status' => 'required|in:pending,ongoing,done',
        ]);

        $service = Serviceused::findOrFail($id);
        $service->update(['status' => $request->status]);

        // Update employee_id di timesheet
        DB::connection('muc__activity__miniproject')
            ->table('timesheet')
            ->where('serviceused_id', $service->id)
            ->update(['employee_id' => $request->employee_id]);

        return redirect()->route('serviceused.index')->with('success', 'Serviceused updated successfully.');
    }


    // ============================
    // DELETE DATA
    // ============================
    public function destroy($id)
    {
        $service = Serviceused::findOrFail($id);
        $service->delete();

        return redirect()->route('serviceused.index')->with('success', 'Serviceused deleted successfully.');
    }
}
