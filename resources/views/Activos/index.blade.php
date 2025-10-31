@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="d-flex justify-content-start pb-2">
                <h2 class="text-info mb-0"><strong>Activos</strong></h2>
            </div>
        </div>
        <div>
        <button class="btn btn-sm btn-dark">+ Crear</button>
        </div>
    </div>
<div class="container-fluid shadow-lg p-3 mb-5 bg-body rounded">
    <div class="table-responsive-lg">
        <table id="activos" class="table table-hover">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre de Activo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Nroserial</th>
                    <th width="15%">Acciones</th> {{-- 🔹 Solo una columna --}}
                </tr>
            </thead>
            <tbody>
                @foreach($activos as $activo)
                    <tr>
                        <td>{{ $activo->Codigo }}</td>
                        <td>{{ $activo->Nombre }}</td>
                        <td>{{ $activo->Marca }}</td>
                        <td>{{ $activo->Modelo }}</td>
                        <td>{{ $activo->NroSerial }}</td>
                        <td>
                            {{-- 🔹 Aseguramos siempre un solo <td> --}}
                            @can('activos.show')
                                <a href="{{ route('activos.show', $activo->id) }}" class="border-0" style="background: transparent; color: inherit;">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endcan

                            @can('activos.edit')
                                </button>
                                <a href="{{ route('activos.edit', $activo->id) }}" class="border-0" style="background: transparent; color: inherit;">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            @endcan

                            @can('activos.destroy')
                                {!! Form::open(['route' => ['activos.destroy', $activo->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                                    <i class="fa fa-trash"></i>
                                {!! Form::close() !!}
                            @endcan
                            @if(!auth()->user()->can('activos.show') &&
                                !auth()->user()->can('activos.edit') &&
                                !auth()->user()->can('activos.destroy'))
                                    <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    $('#activos').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        pageLength: 10,
        ordering: true,
        responsive: true
    });
});
</script>
@endsection
