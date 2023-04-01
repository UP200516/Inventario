<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::orderby('created_at', 'DESC')->get();
        return view('sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion
        $this->validate($request, [
            'size' => 'required|min:4|max:50|unique:sizes'
        ]);

        $size = new Size();
        $size->size = $request->size;
        $size->save();

        flash('Tamaño creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $size = Size::findOrFail($id);
        return view('sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'size' => 'required|min:4|max:50|unique:sizes,size,' . $id
        ]);

        $size = Size::findOrFail($id);

        $size->size = $request->size;
        $size->save();

        flash('Tamaño actualizado exitosamente')->success();
        return redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::findOrFail($id);
        $size->delete();

        flash('Tamaño eliminado exitosamente')->success();
        return redirect()->route('sizes.index');
    }
}
