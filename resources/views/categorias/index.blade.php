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
                            <th>Name</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria) 
                        <tr>
                            <td>{{ $categoria->nombre }}</td>     
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
@endsection