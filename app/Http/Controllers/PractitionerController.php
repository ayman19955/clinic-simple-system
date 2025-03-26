<?php

namespace App\Http\Controllers;

use App\Http\Requests\PractitionerRequest;
use App\Models\Practitioner;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PractitionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $practitioners = Practitioner::when($request->search, function ($query, $search) {
            return $query->where('practitioner_name', 'LIKE', "%{$search}%")
                ->orWhere('specialization', 'LIKE', "%{$search}%")
                ->orWhere('contact_number', 'LIKE', "%{$search}%");
        })->paginate(10); //

        if ($request->ajax()) {
            return view('layouts.dashboard.practitioners._search', compact('practitioners'));
        }
        return view('layouts.dashboard.practitioners.index', compact('practitioners'));
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
    public function store(PractitionerRequest $request)
    {
        try {
            Practitioner::create($request->all());
            return redirect()->back()->with('success', 'تمت إضافة الموظف بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Practitioner $practitioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Practitioner $practitioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PractitionerRequest  $request, $id)
    {
        try {
            $practitioner = Practitioner::findOrFail($id);
            $practitioner->update($request->all());
            return redirect()->back()->with('success', 'تم تعديل الموظف بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Practitioner $practitioner)
    {
        try {
            $practitioner->delete();
            return redirect()->back()->with('success', 'تم حذف الموظف بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
