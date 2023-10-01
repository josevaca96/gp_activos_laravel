@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <div class="px-5">
                @include('activos.error')
                       {!! Form::open( ['route' => 'asignaciones.store']) !!}
                            @include('DetalleAsignacion.partials.form')
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
