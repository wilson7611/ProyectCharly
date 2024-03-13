<?php

namespace App\Http\Controllers;

use App\Models\compras\Compras;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compra = Compras::all();
        $proveedor = Proveedor::all();
        return response()->json([
            'compras' => $compra,
            'proveedores' => $proveedor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_compra' => 'required',
            'proveedor_id' => 'required|exists:proveedors,id'
        ]);

        $compra = Compras::create($request->all());
        return response()->json($compra, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Compras $compras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compras $compra)
    {
        $request->validate([
            'fecha_compra' => 'required',
            'proveedor_id' => 'required|exists:proveedors,id'
        ]);

        $compra->update($request->all());
        return response()->json($compra);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compras $compra)
    {
        $compra->delete();
        return response()->json(null, 204);
    }
}
