@extends('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Editar nota {{$nota->id}}</span>
                    @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif
                    <a href="/notas" class="btn btn-primary btn-sm">Volver a lista de notas...</a>
                </div>
                <div class="card-body">    
                  <form method="POST" action="{{route('notas.update',$nota->id)}}">
                    @method('PUT')
                    @csrf
                    @if (session('Mensaje'))
                        <div class="alert alert-success">
                            {{session('Mensaje')}}
                        </div>
                    @endif

                    @error('nombre')
                        <div class="alert alert-danger">
                            El nombre es obligatorio
                        </div>
                    @enderror

                    @error('descripcion')
                        <div class="alert alert-danger">
                            La descripcion es obligatoria
                        </div>
                    @enderror
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{$nota->nombre}}"
                    />
                    <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2"
                     value="{{$nota->descripcion}}"
                    />
                    <button class="btn btn-warning btn-block" type="submit">Editar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection