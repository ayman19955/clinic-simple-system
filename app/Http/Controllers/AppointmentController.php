<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Practitioner;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $appointments = Appointment::with(['client', 'practitioner'])
            ->when($request->search, function ($query, $search) {
                return $query->where('treatment_type', 'LIKE', "%{$search}%") // Search in treatment_type
                    ->orWhere('status', 'LIKE', "%{$search}%") // Search in status
                    ->orWhereHas('client', function ($q) use ($search) {
                        $q->where('client_name', 'LIKE', "%{$search}%"); // Search in client_name (clients table)
                    })
                    ->orWhereHas('practitioner', function ($q) use ($search) {
                        $q->where('practitioner_name', 'LIKE', "%{$search}%"); // Search in practitioner_name (practitioners table)
                    });
            })
            ->paginate(10);

        // Fetch all clients and practitioners for the modal
        $clients = Client::all();
        $practitioners = Practitioner::all();
        if ($request->ajax()) {
            return view('layouts.dashboard.appointments._search', compact('appointments'));
        }
        return view('layouts.dashboard.appointments.index', compact('appointments', 'clients', 'practitioners'));
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
    public function store(AppointmentRequest $request)
    {
        try {
            Appointment::create($request->all());
            return redirect()->back()->with('success', 'تمت إضافة الموعد بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AppointmentRequest $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentRequest  $request, $id)
    {
        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->update($request->all());
            return redirect()->back()->with('success', 'تم تعديل الموعد بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        try {
            $appointment->delete();
            return redirect()->back()->with('success', 'تم حذف الموظف بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
