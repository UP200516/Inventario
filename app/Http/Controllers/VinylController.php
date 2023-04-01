<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;
use Illuminate\Http\Request;

class VinylController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vinyls = Vinyl::orderby('created_at', 'DESC')->get();
        return view('vinyls.index', compact('vinyls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vinyls.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vinyl::create($request->all());

        flash('Pelicula creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Vinyl $vinyl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vinyl = Vinyl::findOrFail($id);
        return view('vinyls.edit', compact('vinyl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'color' => 'required',
            'thickness' => 'required',
            'price_per_kilo' => 'required',
            'price' => 'required',
            
        ]);

        $vinyl = Vinyl::findOrFail($id);

        $vinyl->color = $request->color;
        $vinyl->thickness = $request->thickness;
        $vinyl->price_per_kilo = $request->price_per_kilo;
        $vinyl->price = $request->price;
        $vinyl->save();

        flash('Pelicula actualizado exitosamente')->success();
        return redirect()->route('vinyls.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vinyl = Vinyl::findOrFail($id);
        $vinyl->delete();

        flash('Pelicula eliminado exitosamente')->success();
        return redirect()->route('vinyls.index');
    }
}
