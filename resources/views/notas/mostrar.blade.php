@extends('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Datos de la nota seleccionada:</span>
                    <a href="/notas" class="btn btn-primary btn-sm">Volver a lista de notas...</a>
                </div>
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $nota->id }}</th>
                                <td>{{ $nota->nombre }}</td>
                                <td>{{ $nota->descripcion }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection