@extends('layouts.app')

@section( 'content' )

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3>Nuevo Producto</h3>
            </div>
            <div class="card-body">
                <form action="{{route('productos.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Stock</label>
                    <input type="text" class="form-control" name="stock">
                </div>
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="form-select">
                        <option value="">Elige</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}" >
                                {{$categoria->nombre}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="imagen">
                </div>
                <br>
                <input type="submit" value="Agregar" class="btn btn-info ">
                </form>
            </div>
        </div>
    </div>
@endsection