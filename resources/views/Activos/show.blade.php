@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <div class="px-5">

                    <div class="d-flex justify-content-center">
                        <div class="d-inline-flex cod_b">
                            <img src="{{ asset('plantilla/img/barra.png') }}" alt="">
                        </div>
                    </div>
                    <p class="text-dark text-center">{{$activo->Codigo}}</p>
                    <div class="row">
                        <div class="col-12">
                            @if(!empty($activo->tipo_activo->Nombre))
                            <p>
                                <svg class="icons_picture" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-tv" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM13.991 3l.024.001a1.46 1.46 0 0 1 .538.143.757.757 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.464 1.464 0 0 1-.143.538.758.758 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.464 1.464 0 0 1-.538-.143.758.758 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.46 1.46 0 0 1 .143-.538.758.758 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3h11.991zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2z" />
                                </svg>
                                <strong>Nombre de activo: &nbsp;</strong>{{$activo->tipo_activo->Nombre}}
                            </p>
                            @endif
                            @if(!empty($activo->Marca))
                            <!-- <div class="col-12"> -->
                                <p>
                                    <svg class="icons_picture" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-bag-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path
                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                    </svg>
                                    <strong>Marca:&nbsp;</strong>{{$activo->Marca}}
                                </p>
                            <!-- </div> -->
                            @endif
                            @if(!empty($activo->Modelo))
                            <!-- <div class="col-12"> -->
                                <p>
                                    <svg class="icons_picture" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-aspect-ratio" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                        <path
                                            d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z" />
                                    </svg>
                                    <strong>Modelo:&nbsp;</strong>{{$activo->Modelo}}
                                </p>
                            <!-- </div> -->
                            @endif
                            @if(!empty($activo->NroSerial))
                            <p>
                                <svg class="icons_picture" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z" />
                                </svg>
                                <strong>Numero de Serial:&nbsp;</strong>{{$activo->NroSerial}}
                            </p>
                            @endif
                        </div>
                        @if(!empty($activo->Observaciones))
                        
                            <p><strong>Condicion:&nbsp;</strong>{{$activo->Condicion}}</p>
                            <div class="d-flex flex-row">
                                <p><strong>Observaciones:&nbsp;</strong></p>
                                <p><a class="tex-primary" data-bs-toggle="collapse" href="#collapseExample"
                                        role="button" aria-expanded="false" aria-controls="collapseExample">ver
                                        mas..</a></p>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <p>{{$activo->Observaciones}} </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection