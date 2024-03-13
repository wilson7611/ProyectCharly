<?php

namespace App\Http\Controllers;

use App\Models\compras\Compras;
use App\Models\egreso\Egreso;
use App\Models\MovientoContable;
use Illuminate\Http\Request;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $egresos = Egreso::all();
        $compras = Compras::all();
        $movimientoContables = MovientoContable::all();

        return response()->json([
            'egresos' => $egresos,
            'compras' => $compras,
            'movimientoContables' => $movimientoContables
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_egreso' => 'required|date',
            'concepto' => 'required',
            'monto' => 'required|numeric',
            'compra_id' => 'required|exists:ventas,id',
            'movimiento_contable_id' => 'required|exists:moviento_contables,id'
        ]);
        try {
            $egreso = new Egreso($request->all());
            $egreso->save();
            return response()->json(['message' => 'El egreso se ha creado correctamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ha ocurrido un error al intentar crear el egreso'], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Egreso $egreso)
    {
        $egreso->load(['compras', 'movimiento_contables']);
        return response()->json($egreso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Egreso $egreso)
    {
        $request->validate([
            'fecha_egreso' => 'required|date',
            'concepto' => 'required',
            'monto' => 'required|numeric',
            'compra_id' => 'required|exists:ventas,id',
            'movimiento_contable_id' => 'required|exists:moviento_contables,id'
        ]);
        $egreso->update($request->all());
        
        return response()->json($egreso, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Egreso $egreso)
    {
        $egreso->delete();
        return response()->json(null, 204);
    }
}
