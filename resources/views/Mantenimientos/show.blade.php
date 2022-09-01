@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
            <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="">{{$obj_mantenimiento[0]->Codigo}}</h1>
                    </div>
                    <div class="col-lg-12 text-center">
                        <p><h6 class="m-0"><strong>Descripción:</strong></h6> {{$obj_mantenimiento[0]->Descripcion}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
