@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
    @include('activos.error')
                {!! Form::model($detalle_asignacions, ['route' => ['asignaciones.update',[
                                                            'IdE'   => $detalle_asignacions[0]->IdE,
                                                            'IdO'   => $detalle_asignacions[0]->IdO,
                                                            'IdD'   => $detalle_asignacions[0]->IdD,
                                                            'IdAct' => $detalle_asignacions[0]->IdAct
                ]],'method' => 'PUT']) !!}
                @livewire('detalle-asignacion-edit', [$transform]) 
        {!! Form::close() !!}           
    </div>
</div>
@endsection