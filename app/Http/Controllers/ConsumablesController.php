<?php

namespace App\Http\Controllers;

use App\Models\Consumables;
use Illuminate\Http\Request;

class ConsumablesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consumables = Consumables::orderby('created_at', 'DESC')->get();
        return view('consumables.index', compact('consumables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consumables.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Consumables::create($request->all());

        flash('Consumible creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Consumables $consumables)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $consumable = Consumables::findOrFail($id);
        return view('consumables.edit', compact('consumable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);

        $consumable = Consumables::findOrFail($id);

        $consumable->name = $request->name;
        $consumable->price = $request->price;
        $consumable->save();

        flash('Consumible actualizado exitosamente')->success();
        return redirect()->route('consumables.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $consumable = Consumables::findOrFail($id);
        $consumable->delete();

        flash('Consumible eliminado exitosamente')->success();
        return redirect()->route('consumables.index');
    }
}
