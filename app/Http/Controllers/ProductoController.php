<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();

        // return response()->json([
        //     'productos' => $producto,
        //     'categorias' => $categoria
        // ]);
        return view('productos.index', compact('productos', 'categorias'));

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
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all(); // Obtener todos los datos del request

        if($request->hasFile('imagen')) {
            // Obtener el archivo de imagen del request
            $imagen = $request->file('imagen');

            // Almacenar la imagen en el directorio 'public/productos'
            $imagenPath = $imagen->store('productos', 'public');

            // Asignar la ruta de la imagen al campo 'imagen' en los datos
            $data['imagen'] = $imagenPath;
        }

        // Crear el producto con los datos actualizados
        $producto = Producto::create($data);

        // Devolver una respuesta JSON con el producto creado
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
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Agregar validación para la imagen
        ]);

        // Obtener los datos del request
        $data = $request->all();

        // Verificar si se proporcionó una nueva imagen
        if($request->hasFile('imagen')) {
            // Obtener el archivo de imagen del request
            $imagen = $request->file('imagen');

            // Almacenar la nueva imagen en el directorio 'public/productos'
            $imagenPath = $imagen->store('productos', 'public');

            // Asignar la ruta de la nueva imagen al campo 'imagen' en los datos
            $data['imagen'] = $imagenPath;

            // Eliminar la imagen anterior si existe
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
        }

        // Actualizar el producto con los datos actualizados
        $producto->update($data);

        // Devolver una respuesta JSON con el producto actualizado
        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {

        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return response()->json(null, 204);
    }
}
