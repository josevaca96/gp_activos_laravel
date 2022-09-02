@extends('layouts.app')

@section('content')
<div cl1ass="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <!-- <div class="card-header">Activo</div> -->

                <div class="px-5">
                    @include('activos.error')
                        {{-- Componente livewire --}}
                        <livewire:mantenimientos.mantenimientos-edit-component :Mantenimiento="$mantenimiento">
                        {{-- @livewire('mantenimientos.mantenimientos-edit-component', ['Mantenimiento' => $mantenimiento, $activo]) --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
