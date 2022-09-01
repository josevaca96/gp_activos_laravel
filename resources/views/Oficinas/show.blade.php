@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
            <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>{{$oficina->Direccion}}</h2>
                    </div>
                    <div class="col-lg-12 text-center">
                        <p>{{$oficina->Descripcion}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection