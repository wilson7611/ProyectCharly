<?php

namespace App\Http\Controllers;

use App\Models\compras\Compras;
use App\Models\detalleCompra\DetalleCompra;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalleCompra = DetalleCompra::all();
        $compra = Compras::all();
        $producto = Producto::all();
        return response()->json([
            'detalleCompras' => $detalleCompra,
            'compras' => $compra,
            'productos' => $producto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'compra_id' => 'required|exists:compras,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer',
            'precio_unitario' => 'required|numeric',
            'subtotal' => 'required|numeric'
        ]);

        $detalleCompra = DetalleCompra::create($request->all());
        return response()->json($detalleCompra, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleCompra $detalleCompra)
    {
        $request->validate([
            'compra_id' => 'required|exists:compras,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer',
            'precio_unitario' => 'required|numeric',
            'subtotal' => 'required|numeric'
        ]);

        $detalleCompra->update($request->all());
        return response()->json($detalleCompra);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleCompra $detalleCompra)
    {
        $detalleCompra->delete();
        return response()->json(null, 204);
    }
}
