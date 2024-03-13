<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalleVentas = DetalleVenta::all();
        $ventas = Venta::all();
        $productos = Producto::all();

        return response()->json([
            'detalleVentas' => $detalleVentas,
            'ventas' => $ventas,
            'productos' => $productos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|numeric',
            'precio_unitario' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id'
        ]);

        $detalleVenta = DetalleVenta::create($request->all());

        return response()->json($detalleVenta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleVenta $detalleVenta)
    {
        $detalleVenta->load(['ventas', 'productos']);

        return response()->json($detalleVenta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        $request->validate([
            'cantidad' => 'required|numeric',
            'precio_unitario' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id'
        ]);

        $detalleVenta->update($request->all());

        return response()->json($detalleVenta, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleVenta $detalleVenta)
    {
        $detalleVenta->delete();

        return response()->json(null, 204);
    }
}
