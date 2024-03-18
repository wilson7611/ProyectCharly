<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        // return response()->json($categorias);
        return view('categorias.index', compact('categorias'));
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return response()->json($categoria, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->json(null, 204);
    }
}
