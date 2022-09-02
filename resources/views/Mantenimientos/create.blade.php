@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <div class="px-5">
                <livewire:mantenimientos.mantenimientos-component />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
