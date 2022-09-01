@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <img src="{{ asset('img/empresarial_logo/BRISAS_DE_PAZ.png') }}" class="card-img-top" alt="...">
                    <!-- <div class="card-body">
                        <h5 class="card-title">Cant:&nbsp;10</h5>
                    </div> -->
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <img src="{{ asset('img/empresarial_logo/CELINA_HOGAR.png') }}" class="card-img-top" alt="...">
                    <!-- <div class="card-body">
                        <h5 class="card-title">Cant:&nbsp;10</h5>
                    </div> -->
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <img src="{{ asset('img/empresarial_logo/CELINA_URBANIZACIONES.png') }}" class="card-img-top"
                        alt="...">
                        <!-- <div class="card-body">
                        <h5 class="card-title">Cant:&nbsp;10</h5>
                    </div> -->
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <img src="{{ asset('img/empresarial_logo/GALILEO.png') }}" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <img src="{{ asset('img/empresarial_logo/MULTIPAGO.png') }}" class="card-img-top" alt="...">
                    <!-- <div class="card-body">
                        <h5 class="card-title">Cant:&nbsp;10</h5>
                    </div> -->
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <img src="{{ asset('img/empresarial_logo/PACUSITO.png') }}" class="card-img-top" alt="...">
                    <!-- <div class="card-body">
                        <h5 class="card-title">Cant:&nbsp;10</h5>
                    </div> -->
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <img src="{{ asset('img/empresarial_logo/PRODASA.png') }}" class="card-img-top" alt="...">
                    <!-- <div class="card-body">
                        <h5 class="card-title">Cant:&nbsp;10</h5>
                    </div> -->
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <img src="{{ asset('img/empresarial_logo/TICKETEG.png') }}" class="card-img-top" alt="...">
                    <!-- <div class="card-body">
                        <h5 class="card-title">Cant:&nbsp;10</h5>
                    </div> -->
                </div>
            </div>
            <div class="col">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <img src="{{ asset('img/empresarial_logo/TIENDA_CELINA.png') }}" class="card-img-top" alt="...">
                    <!-- <div class="card-body">
                        <h5 class="card-title">Cant:&nbsp;10</h5>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<!-- <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif -->