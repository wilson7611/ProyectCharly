<?php

namespace App\Http\Controllers;

use App\Models\MovientoContable;
use Illuminate\Http\Request;

class MovientoContableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movimietos_contables = MovientoContable::all();

        return response()->json($movimietos_contables);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_movimiento' => 'required',
            'concepto' => 'required',
            'fecha_movimiento' => 'required|date',
            'monto' => 'required|numeric'
        ]);
        $movientoContable = MovientoContable::create($request->all());

        return response()->json($movientoContable, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MovientoContable $movientoContable)
    {
        return response()->json($movientoContable); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MovientoContable $movientoContable)
    {
        $request->validate([
            'tipo_movimiento' => 'required',
            'concepto' => 'required',
            'fecha_movimiento' => 'required|date',
            'monto' => 'required|numeric'
        ]);

        $movientoContable->update($request->all());
        
        return response()->json($movientoContable, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovientoContable $movientoContable)
    {
        $movientoContable->delete();

        return response()->json(null, 204);
    }
}
