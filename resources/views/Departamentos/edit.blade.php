@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <div class="px-5">
                @include('activos.error')
                       {!! Form::model($departamento, ['route' => ['departamentos.update', $departamento->id],
                         'method' => 'PUT']) !!}

                            @include('Departamentos.partials.form')

                        {!! Form::close() !!} 
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection