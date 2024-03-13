<?php

namespace App\Http\Controllers;

use App\Models\bonificacion\Bonificacion;
use App\Models\Cliente;
use Illuminate\Http\Request;

class BonificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return response()->json($clientes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:100',
            'descuento' => 'required|numeric',
            'cliente_id' => 'required|exists:clientes,id'
        ]);

        $cliente = Cliente::create($request->all());

        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bonificacion $bonificacion)
    {
        $bonificacion->load('clientes');

        return response()->json($bonificacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bonificacion $bonificacion)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:100',
            'descuento' => 'required|numeric',
            'cliente_id' => 'required|exists:clientes,id'
        ]);

        $bonificacion->update($request->all());

        return response()->json($bonificacion, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bonificacion $bonificacion)
    {
        $bonificacion->delete();

        return response()->json(null, 204);
    }
}
