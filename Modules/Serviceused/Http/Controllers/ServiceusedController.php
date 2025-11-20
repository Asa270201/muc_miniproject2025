<?php

namespace Modules\Serviceused\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\marketing\ServiceusedModel as Serviceused;

class ServiceusedController extends Controller
{
    // Tampilkan list
    public function index()
    {
        $services = Serviceused::all();
        return view('serviceused::index', compact('services'));
    }

    // Tampilkan form create
    public function create()
    {
        return view('serviceused::create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'proposal_id' => 'required',
            'service_name' => 'required',
            'status' => 'required|in:pending,ongoing,done',
        ]);

        Serviceused::create($request->all());

        return redirect()->route('serviceused.index')->with('success', 'Serviceused created successfully.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $service = Serviceused::findOrFail($id);
        return view('serviceused::edit', compact('service'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'proposal_id' => 'required',
            'service_name' => 'required',
            'status' => 'required|in:pending,ongoing,done',
        ]);

        $service = Serviceused::findOrFail($id);
        $service->update($request->all());

        return redirect()->route('serviceused.index')->with('success', 'Serviceused updated successfully.');
    }

    // Delete data
    public function destroy($id)
    {
        $service = Serviceused::findOrFail($id);
        $service->delete();

        return redirect()->route('serviceused.index')->with('success', 'Serviceused deleted successfully.');
    }
}
