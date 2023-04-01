<?php

namespace App\Http\Controllers;

use App\Models\Plush;
use Illuminate\Http\Request;

class PlushController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plushes = Plush::orderby('created_at', 'DESC')->get();
        return view('plushes.index', compact('plushes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plushes.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Plush::create($request->all());

        flash('Felpa creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Plush $plush)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plush = Plush::findOrFail($id);
        return view('plushes.edit', compact('plush'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'color'  => 'required',
            'type'  => 'required',
            'price_per_meter'  => 'required',
            'price'  => 'required',

        ]);

        $plush = Plush::findOrFail($id);

        $plush->name = $request->name;
        $plush->color = $request->color;
        $plush->type = $request->type;
        $plush->price_per_meter = $request->price_per_meter;
        $plush->price = $request->price;
        $plush->save();

        flash('Felpa actualizado exitosamente')->success();
        return redirect()->route('plushes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plush = Plush::findOrFail($id);
        $plush->delete();

        flash('Felpa eliminado exitosamente')->success();
        return redirect()->route('plushes.index');
    }
}
