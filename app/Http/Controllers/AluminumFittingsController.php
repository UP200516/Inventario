<?php

namespace App\Http\Controllers;

use App\Models\AluminumFittings;
use Illuminate\Http\Request;

class AluminumFittingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aluminum_fittings = AluminumFittings::all();
        return view('aluminum_fittings.index', compact('aluminum_fittings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aluminum_fittings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AluminumFittings::create($request->all());

        flash('Herraje creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(AluminumFittings $aluminumFittings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluminum_fitting = AluminumFittings::findOrFail($id);
        return view('aluminum_fittings.edit', compact('aluminum_fitting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'size' => 'required',
            'thickness' => 'required',
            'price' => 'required',
        ]);

        $aluminum_fitting = AluminumFittings::findOrFail($id);

        $aluminum_fitting->name = $request->name;
        $aluminum_fitting->color = $request->color;
        $aluminum_fitting->size = $request->size;
        $aluminum_fitting->thickness = $request->thickness;
        $aluminum_fitting->price = $request->price;
        $aluminum_fitting->save();

        flash('Herraje actualizado exitosamente')->success();
        return redirect()->route('aluminum_fittings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluminum_fitting = AluminumFittings::findOrFail($id);
        $aluminum_fitting->delete();

        flash('Herraje eliminado exitosamente')->success();
        return redirect()->route('aluminum_fittings.index');
    }
}
