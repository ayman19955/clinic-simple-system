<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $payments = Payment::with(['client', 'appointment'])
            ->when($request->search, function ($query, $search) {
                return $query->where('amount', 'LIKE', "%{$search}%") // Search in amount
                    ->orWhere('payment_method', 'LIKE', "%{$search}%") // Search in payment method
                    ->orWhereHas('client', function ($q) use ($search) {
                        $q->where('client_name', 'LIKE', "%{$search}%"); // Search in client_name (clients table)
                    })
                    ->orWhereHas('appointment', function ($q) use ($search) {
                        $q->where('treatment_type', 'LIKE', "%{$search}%"); // Search in treatment_type (appointments table)
                    });
            })
            ->paginate(10);

        // Fetch all clients and appointments for the modal
        $clients = Client::all();
        $appointments = Appointment::all();

        if ($request->ajax()) {
            return view('layouts.dashboard.payments._search', compact('payments'));
        }

        return view('layouts.dashboard.payments.index', compact('payments', 'clients', 'appointments'));
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
    public function store(Request $request)
    {
        try {
            Payment::create($request->all());
            return redirect()->back()->with('success', 'تمت إضافة الدفع بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, $id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->update($request->all());
            return redirect()->back()->with('success', 'تم تعديل الدفع بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        try {
            $payment->delete();
            return redirect()->back()->with('success', 'تم حذف الدفع بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function getAppointmentsByClient(Request $request)
    {
        $clientId = $request->input('client_id');

        // Fetch appointments for the selected client
        $appointments = Appointment::where('client_id', $clientId)
            ->with('client') // Eager load the client relationship
            ->get();

        return response()->json($appointments);
    }
}
