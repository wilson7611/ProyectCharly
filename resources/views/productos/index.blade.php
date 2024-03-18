@extends('layouts.app')

@section('content')


        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Buttons Datatables</h5>
            </div>
            <div class="card-body">
                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto) 
                        <tr>
                            <td>{{ $producto->nombre }}</td> 
                            <td>{{ $producto->descripcion }}</td> 
                            <td>{{ $producto->precio }}</td> 
                            <td>{{ $producto->stock }}</td> 
                            <td>{{ $producto->categorias->nombre }}</td>     
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
@endsection