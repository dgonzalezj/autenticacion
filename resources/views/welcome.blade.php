@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Usuarios</span>
                </div>
                <div class="card-body">      
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Usuarios</th>
                            <th scope="col">Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notas as $item)
                            <tr>
                                <th scope="row">{{ $item->usuario}}</th>
                                <td>{{ $item->nombre }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- fin card body --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
