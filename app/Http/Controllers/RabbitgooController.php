<?php

namespace App\Http\Controllers;

use App\Models\Rabbitgoo;
use Illuminate\Http\Request;

class RabbitgooController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rabbitgoos = Rabbitgoo::orderby('created_at', 'DESC')->get();
        return view('rabbitgoos.index', compact('rabbitgoos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rabbitgoos.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Rabbitgoo::create($request->all());

        flash('Pelicula creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Rabbitgoo $rabbitgoo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rabbitgoo = Rabbitgoo::findOrFail($id);
        return view('rabbitgoos.edit', compact('rabbitgoo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'color' => 'required',
            'figure' => 'required',
            'price_per_meter' => 'required',
            'price' => 'required',
        ]);

        $rabbitgoo = Rabbitgoo::findOrFail($id);

        $rabbitgoo->color = $request->color;
        $rabbitgoo->figure = $request->figure;
        $rabbitgoo->price_per_meter = $request->price_per_meter;
        $rabbitgoo->price = $request->price;
        $rabbitgoo->save();

        flash('Pelicula actualizado exitosamente')->success();
        return redirect()->route('rabbitgoos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rabbitgoo = Rabbitgoo::findOrFail($id);
        $rabbitgoo->delete();

        flash('Pelicula eliminado exitosamente')->success();
        return redirect()->route('rabbitgoos.index');
    }
}
