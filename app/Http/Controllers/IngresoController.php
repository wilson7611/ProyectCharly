<?php

namespace App\Http\Controllers;

use App\Models\ingreso\Ingreso;
use App\Models\MovientoContable;
use App\Models\Venta;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $ingresos = Ingreso::all();
       $ventas = Venta::all();
       $movimiento_contables = MovientoContable::all();

       return response()->json([
        'ingresos' => $ingresos,
        'ventas' => $ventas,
        'movimiento_contables' => $movimiento_contables
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_ingreso' => 'required|date',
            'concepto' => 'required',
            'monto' => 'required|numeric',
            'venta_id' => 'required|exists:ventas,id',
            'movimiento_contable_id' => 'required|exists:moviento_contables,id'
        ]);

        $ingreso = Ingreso::create($request->all());

        return response()->json($ingreso, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingreso $ingreso)
    {
        $ingreso->load(['ventas', 'movimiento_contables']);

        return response()->json($ingreso);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        $request->validate([
            'fecha_ingreso' => 'required|date',
            'concepto' => 'required',
            'monto' => 'required|numeric',
            'venta_id' => 'required|exists:ventas,id',
            'movimiento_contable_id' => 'required|exists:moviento_contables,id'
        ]);
        $ingreso->update($request->all());

        return response()->json($ingreso, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();

        return response()->json(null, 204);
    }
}
