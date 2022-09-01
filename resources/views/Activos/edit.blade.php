@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <!-- <div class="card-header">Activo</div> -->

                <div class="px-5">
                @include('activos.error')
                       {!! Form::model($activo, ['route' => ['activos.update', $activo->id],
                         'method' => 'PUT']) !!}

                            @include('activos.partials.formedit')

                        {!! Form::close() !!} 
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection