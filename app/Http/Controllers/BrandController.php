<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderby('created_at', 'DESC')->get();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion
        $this->validate($request, [
            'name' => 'required|min:4|max:50|unique:brands'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        flash('Marca creada exitosamente')->success();
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
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:50|unique:brands,name,' . $id
        ]);

        $brand = Brand::findOrFail($id);

        $brand->name = $request->name;
        $brand->save();

        flash('Marca actualizada exitosamente')->success();
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        flash('Marca eliminada exitosamente')->success();
        return redirect()->route('brands.index');
    }
}
