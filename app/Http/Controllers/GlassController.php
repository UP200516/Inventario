<?php

namespace App\Http\Controllers;

use App\Models\Glass;
use Illuminate\Http\Request;

class GlassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $glasses = Glass::orderby('created_at', 'DESC')->get();
        return view('glasses.index', compact('glasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('glasses.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Glass::create($request->all());

        flash('Vidrio creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Glass $glass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $glass = Glass::findOrFail($id);
        return view('glasses.edit', compact('glass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'color'  => 'required',
            'size'  => 'required',
            'thickness'  => 'required',
            'price_per_meter'  => 'required',
            'price'  => 'required',
        ]);

        $glass = Glass::findOrFail($id);

        $glass->color = $request->color;
        $glass->size = $request->size;
        $glass->thickness = $request->thickness;
        $glass->price_per_meter = $request->price_per_meter;
        $glass->price = $request->price;
        $glass->save();

        flash('Vidrio actualizado exitosamente')->success();
        return redirect()->route('glasses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $glass = Glass::findOrFail($id);
        $glass->delete();

        flash('Vidrio eliminado exitosamente')->success();
        return redirect()->route('glasses.index');
    }
}
