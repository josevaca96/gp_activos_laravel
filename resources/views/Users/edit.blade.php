@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row-">
        <div class="col shadow-sm p-3 mb-5 bg-white rounded">
            <div class="card ">
                <div class="card-header text-white h3 bg-primary mt-0 ">Usuario</div>

                <div class="card-body">
                       {!! Form::model($user, ['route' => ['users.update', $user->id],
                         'method' => 'PUT']) !!}

                            @include('users.partials.form')

                        {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection