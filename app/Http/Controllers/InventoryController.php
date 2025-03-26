<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inventories = Inventory::when($request->search, function ($query, $search) {
            return $query->where('product_name', 'LIKE', "%{$search}%") // Search in product_name
                ->orWhere('product_type', 'LIKE', "%{$search}%") // Search in product_type
                ->orWhere('quantity', 'LIKE', "%{$search}%") // Search in quantity
                ->orWhere('expiry_date', 'LIKE', "%{$search}%"); // Search in expiry_date
        })->paginate(10);

        if ($request->ajax()) {
            return view('layouts.dashboard.inventories._search', compact('inventories'));
        }

        return view('layouts.dashboard.inventories.index', compact('inventories'));
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
            Inventory::create($request->all());
            return redirect()->back()->with('success', 'تمت إضافة المنتج بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $inventory = Inventory::findOrFail($id);
            $inventory->update($request->all());
            return redirect()->back()->with('success', 'تم تعديل المنتج بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        try {
            $inventory->delete();
            return redirect()->back()->with('success', 'تم حذف المنتج بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
