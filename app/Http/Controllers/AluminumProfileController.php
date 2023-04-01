<?php

namespace App\Http\Controllers;

use App\Models\AluminumProfile;
use Illuminate\Http\Request;

class AluminumProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aluminum_profiles = AluminumProfile::all();
        return view('aluminum_profiles.index', compact('aluminum_profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aluminum_profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AluminumProfile::create($request->all());

        flash('Perfil creado exitosamente')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(AluminumProfile $aluminumProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluminum_profile = AluminumProfile::findOrFail($id);
        return view('aluminum_profiles.edit', compact('aluminum_profile'));
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
            'price_per_meter'  => 'required',
            'price'  => 'required',
        ]);

        $aluminum_profile = AluminumProfile::findOrFail($id);

        $aluminum_profile->name = $request->name;
        $aluminum_profile->color = $request->color;
        $aluminum_profile->size = $request->size;
        $aluminum_profile->thickness = $request->thickness;
        $aluminum_profile->price_per_meter = $request->price_per_meter;
        $aluminum_profile->price = $request->price;
        $aluminum_profile->save();

        flash('Perfil actualizado exitosamente')->success();
        return redirect()->route('aluminum_profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluminum_profile = AluminumProfile::findOrFail($id);
        $aluminum_profile->delete();

        flash('Perfil eliminado exitosamente')->success();
        return redirect()->route('aluminum_profiles.index');
    }
}
