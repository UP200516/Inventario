<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderby('created_at', 'DESC')->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Client::create($request->all());

        flash('Cliente creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'state' => 'required',
            'rfc' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $client = Client::findOrFail($id);

        $client->full_name = $request->full_name;
        $client->address = $request->address;
        $client->zip_code = $request->zip_code;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->rfc = $request->rfc;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->save();

        flash('Cliente actualizado exitosamente')->success();
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        flash('Cliente eliminado exitosamente')->success();
        return redirect()->route('clients.index');
    }
}
