@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vehículo</div>

                <div class="card-body">
                        <p><strong>Código:</strong> &nbsp;{{$detalle[0]->Codigo}}</p>
                        <p><strong>Activo:</strong> &nbsp;{{$detalle[0]->activo}}</p>
                        <p><strong>Usuario Asignado:</strong>{{$detalle[0]->UsuarioAsig}}</p>
                        <p><strong>Oficina:</strong> &nbsp; {{$detalle[0]->Direccion}}</p>
                        <p><strong>Departamento:</strong> &nbsp;{{$detalle[0]->departamento}}</p>
                        <p><strong>Fecha Inicial:</strong> &nbsp;{{$detalle[0]->fecha_i}}</p>
                        <p><strong>Fecha Final:</strong> &nbsp;{{$detalle[0]->fecha_f ?: '(Sin Asignar)'}}</p>
                        <p><strong>Captura de Recurso: &nbsp;</strong>{{$detalle[0]->CapRecursos}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
