<?php

namespace App\Http\Controllers;

use App\Models\GlassFittings;
use Illuminate\Http\Request;

class GlassFittingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $glass_fittings = GlassFittings::orderby('created_at', 'DESC')->get();
        return view('glass_fittings.index', compact('glass_fittings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('glass_fittings.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        GlassFittings::create($request->all());

        flash('Herraje creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(GlassFittings $glassFittings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $glass_fitting = GlassFittings::findOrFail($id);
        return view('glass_fittings.edit', compact('glass_fitting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name'  => 'required',
            'color'  => 'required',
            'size'  => 'required',
            'thickness'  => 'required',
            'price'  => 'required',

        ]);

        $glass_fitting = GlassFittings::findOrFail($id);

        $glass_fitting->name = $request->name;
        $glass_fitting->color = $request->color;
        $glass_fitting->size = $request->size;
        $glass_fitting->thickness = $request->thickness;
        $glass_fitting->price = $request->price;
        $glass_fitting->save();

        flash('Herraje actualizado exitosamente')->success();
        return redirect()->route('glass_fittings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $glass_fitting = GlassFittings::findOrFail($id);
        $glass_fitting->delete();

        flash('Herraje eliminado exitosamente')->success();
        return redirect()->route('glass_fittings.index');
    }
}
