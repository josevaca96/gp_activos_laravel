 @extends('layouts.app')
 @section('content')
<div class="container-fluid shadow-sm p-3 mb-5 bg-white rounded">
    <h1 class="text-info mb-0"><strong>Mantenimientos</strong></h1>
    <p class="px-2 text-info mb-0">Próximos Mantenimientos</p>
    @can('mantenimientos.create')
        <a class="text-info px-2" href="{{ route('mantenimientos.create') }}">Crear |</a>
    @endcan
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="row">
                @foreach ($mantenimientos as $mantenimiento)
                    @php
                        // Si la longitud es mayor que el límite...
                        if (strlen($mantenimiento->Descripcion) > 50) {
                            // Entonces corta la cadena y ponle el sufijo
                            $mantenimiento->Descripcion = substr($mantenimiento->Descripcion, 0, 50) . '...';
                        }
                    @endphp
                    <div class="col-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-info">{{ $mantenimiento->Codigo }}</h5>
                                <p class="mb-2">{{ $mantenimiento->Descripcion }}
                                </p>
                                <div class="row px-4">
                                    <div class="col pl-3 pr-0">
                                        <a href="{{ route('mantenimientos.show', $mantenimiento->id) }}">Ver</a>
                                    </div>
                                    <div class="col p-0">
                                        <a href="{{ route('mantenimientos.edit', $mantenimiento->id) }}">|Editar</a>
                                    </div>
                                    <div class="col pl-0 pr-3">{!! Form::open(['route' => ['mantenimientos.destroy', $mantenimiento->id], 'method' => 'DELETE']) !!}
                                        <a href="#">|Cerrar</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

 @endsection
