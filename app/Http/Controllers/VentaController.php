<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\venta\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::all();
        $clientes = Cliente::all();
        $vendedores = User::all();

        return response()->json([
            'ventas' => $ventas,
            'clientes' => $clientes,
            'vendedores' => $vendedores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_venta' => 'required|date',
            'total' => 'required|numeric',
            'cliente_id' => 'required|exists:clientes,id',
            'vendedor_id' => 'required|exists:users,id'
        ]);

        $venta = Venta::create($request->all());

        return response()->json($venta, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        $venta->load(['clientes', 'vendedores']);

        return response()->json($venta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'fecha_venta' => 'required|date',
            'total' => 'required|numeric',
            'cliente_id' => 'required|exists:clientes,id',
            'vendedor_id' => 'required|exists:users,id'
        ]);

        $venta->update($request->all());

        return response()->json($venta, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();

        return response()->json(null, 204);
    }
}
