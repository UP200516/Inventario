<?php

namespace App\Http\Controllers;

use App\Models\Polycarbonate;
use Illuminate\Http\Request;

class PolycarbonateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polycarbonates = Polycarbonate::orderby('created_at', 'DESC')->get();
        return view('polycarbonates.index', compact('polycarbonates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polycarbonates.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Polycarbonate::create($request->all());

        flash('Policarbonato creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Polycarbonate $polycarbonate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $polycarbonate = Polycarbonate::findOrFail($id);
        return view('polycarbonates.edit', compact('polycarbonate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'color'  => 'required',
            'size'  => 'required',
            'price_per_meter'  => 'required',
            'price'  => 'required',
        ]);

        $polycarbonate = Polycarbonate::findOrFail($id);

        $polycarbonate->color = $request->color;
        $polycarbonate->size = $request->size;
        $polycarbonate->price_per_meter = $request->price_per_meter;
        $polycarbonate->price = $request->price;
        $polycarbonate->save();

        flash('Policarbonato actualizado exitosamente')->success();
        return redirect()->route('polycarbonates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $polycarbonate = Polycarbonate::findOrFail($id);
        $polycarbonate->delete();

        flash('Policarbonato eliminado exitosamente')->success();
        return redirect()->route('polycarbonates.index');
    }
}
