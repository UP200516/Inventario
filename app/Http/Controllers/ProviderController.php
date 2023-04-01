<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = Provider::orderby('created_at', 'DESC')->get();
        return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('providers.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Provider::create($request->all());

        flash('Proveedor creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $provider = Provider::findOrFail($id);
        return view('providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'manager_name' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'state' => 'required',
            'rfc' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $provider = Provider::findOrFail($id);

        $provider->full_name = $request->full_name;
        $provider->address = $request->address;
        $provider->zip_code = $request->zip_code;
        $provider->city = $request->city;
        $provider->state = $request->state;
        $provider->rfc = $request->rfc;
        $provider->email = $request->email;
        $provider->phone = $request->phone;
        $provider->save();

        flash('Proveedor actualizado exitosamente')->success();
        return redirect()->route('providers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        flash('Proveedor eliminado exitosamente')->success();
        return redirect()->route('providers.index');
    }
}
