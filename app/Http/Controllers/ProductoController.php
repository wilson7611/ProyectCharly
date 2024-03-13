<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\producto\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Producto::all();
        $categoria = Categoria::all();

        return response()->json([
            'productos' => $producto,
            'categorias' => $categoria
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id' 
        ]);

        $producto = Producto::create($request->all());

        return response()->json($producto, 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        $producto->load('categorias');

        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id' 
        ]);

        $producto->update($request->all());

        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->json(null, 204); 
    }
}
