<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technologie;

class TechnologieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technologie::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = Technologie::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già esistente');
        }else{
            $new = new Technologie();
            $new->name = $request->name;
            $new->save();
            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia aggiunta');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technologie $technology)
    {

        $val_data = $request->all();
        $exists = Technologie::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già esistente');
        }else{
            // $technologie->name = $request->name;
            $technology->update( $val_data);
            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia modificata correttamente');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Technologie $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia modificata correttamente');

    }
}
