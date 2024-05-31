<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller



{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
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
        $exists = Type::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.types.index')->with('error', 'Tecnologia già esistente');
        }else{
            $new = new Type();
            $new->name = $request->name;
            $new->save();
            return redirect()->route('admin.types.index')->with('success', 'Tecnologia aggiunta');
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
    public function update(Request $request, Type $type)
    {

        $val_data = $request->all();
        $exists = Type::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.types.index')->with('error', 'Tipo già esistente');
        }else{
            $type->update( $val_data);
            return redirect()->route('admin.types.index')->with('success', 'Tipo modificata correttamente');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', 'Tecnologia modificata correttamente');

    }
}
