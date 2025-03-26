<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $clients = Client::when($request->search, function ($query, $search) {
            return $query->where('client_name', 'LIKE', "%{$search}%")
                ->orWhere('contact_number', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%");
        })->paginate(10); //
        if ($request->ajax()) {
            return view('layouts.dashboard.clients._search', compact('clients'));
        }
        return view('layouts.dashboard.clients.index', compact('clients'));
    }

    public function show()
    {
        //
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


    public function store(ClientRequest $request)
    {


        try {
            // Create Client
            Client::create($request->all());

            return redirect()->back()->with('success', 'تمت إضافة العميل بنجاح!');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Update existing client
     */
    public function update(ClientRequest $request, $id)
    {


        try {
            $client = Client::findOrFail($id);
            $client->update($request->all());

            return redirect()->back()->with('success', 'تم تحديث بيانات العميل بنجاح');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Delete a client
     */
    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();

            return redirect()->back()->with('success', 'تم حذف بيانات العميل بنجاح');
        } catch (ValidationException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $clients = Client::where('client_name', 'LIKE', "%{$query}%")
            ->orWhere('contact_number', 'LIKE', "%{$query}%")
            ->orWhere('address', 'LIKE', "%{$query}%")
            ->get();

        return view('clients._search', compact('clients'));
    }
}
