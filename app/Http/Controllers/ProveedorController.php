<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();

        return response()->json($proveedores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email'
        ]);

        $proveedor = Proveedor::create($request->all());

        return response()->json($proveedor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return response()->json($proveedor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Proveedor $proveedor)
    {
        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>'required|email'
        ]);
       
        $proveedor->update($request->all());

        return response()->json($proveedor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
       $proveedor->delete();
       
       return response()->json(null, 404);
    }
}
