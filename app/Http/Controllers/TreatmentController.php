<?php

namespace App\Http\Controllers;

use App\Http\Requests\TreatmentRequest;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Practitioner;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $treatments = Treatment::with(['appointment.client', 'appointment.practitioner'])
            ->when($request->search, function ($query, $search) {
                return $query->where('treatment_description', 'LIKE', "%{$search}%") // Search in treatment_description
                    ->orWhereHas('appointment', function ($q) use ($search) {
                        $q->whereHas('client', function ($q2) use ($search) {
                            $q2->where('client_name', 'LIKE', "%{$search}%"); // Search in client_name (clients table)
                        })
                            ->orWhereHas('practitioner', function ($q2) use ($search) {
                                $q2->where('practitioner_name', 'LIKE', "%{$search}%"); // Search in practitioner_name (practitioners table)
                            });
                    });
            })
            ->paginate(10);

        // Fetch all appointments, clients, and practitioners for the modal
        $appointments = Appointment::all();
        $clients = Client::all();
        $practitioners = Practitioner::all();

        if ($request->ajax()) {
            return view('layouts.dashboard.treatments._search', compact('treatments'));
        }

        return view('layouts.dashboard.treatments.index', compact('treatments', 'appointments', 'clients', 'practitioners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TreatmentRequest $request)
    {
        try {
            Treatment::create($request->all());
            return redirect()->back()->with('success', 'تمت إضافة العلاج بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treatment $treatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TreatmentRequest $request, $id)
    {
        try {
            $treatment = Treatment::findOrFail($id);
            $treatment->update($request->all());
            return redirect()->back()->with('success', 'تم تعديل العلاج بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatment $treatment)
    {
        try {
            $treatment->delete();
            return redirect()->back()->with('success', 'تم حذف العلاج بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
