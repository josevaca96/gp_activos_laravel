@include('activos.error')
{!! Form::open( ['route' => 'activos.store']) !!}
<div class="text-center">
    <h1 class="pt-5 t-principal m-0">Fomulario de Activos</h1>
</div>
<hr>
<div class="row pt-4">
    <a class="pb-1" href="#" data-bs-toggle="collapse"
            data-bs-target="#multiCollapseExample2" aria-expanded="false"
            aria-controls="multiCollapseExample2" >>>>> asignación rápida ▼</a>
    <!-- <p>
        <button class="btn btn-outline-primary p-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#multiCollapseExample2" aria-expanded="false"
            aria-controls="multiCollapseExample2" style="padding:2px !important;" >Asignación Rápida ▼</button>
    </p> -->
    <div class="row">
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card card-body">
                    <div class="row" id="contenedor1">
                        <div class="col-4 pt-2">
                            <label for="" class="mb-0">Empresa</label>
                            <select name="IdE" class="form-control">
                                <option value="">Seleccione una opción...</option>
                                @foreach($empresas as $empresa)
                                <option value="{{$empresa->id}}">{{$empresa->Nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 pt-2">
                            <label for="" class="mb-0">Oficina</label>
                            <select name="IdO" class="form-control">
                                <option value="">Seleccione una opción...</option>
                                @foreach($oficinas as $oficina)
                                <option value="{{$oficina->id}}">{{$oficina->Direccion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 pt-2">
                            <label for="" class="mb-0">Departamento</label>
                            <select name="IdD" class="form-control">
                                <option value="">Seleccione una opción...</option>
                                @foreach($departamentos as $departamento)
                                <option value="{{$departamento->id}}">{{$departamento->Nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 pt-2">
                            <label for="" class="mb-0">Fecha Inicio</label>
                            <!-- \Carbon\Carbon::now() -->
                            {{Form::date('fecha_i',\Carbon\Carbon::now(),['class' => 'form-control'])}}
                        </div>
                        <div class="col-3 pt-2">
                            <label for="" class="mb-0">Fecha Fin</label>
                            {{Form::date('fecha_f', NULL,['class' => 'form-control','placeholder' => 'dd/mm/aaaa'])}}
                        </div>
                        <div class="col-4 pt-2">
                            <label for="" class="mb-0">Usuario Asignado</label>
                            {{ Form::text('UsuarioAsig', null , ['class' => 'form-control']) }}
                        </div>
                        <div class="col-2 pt-2">
                            <label for="" class="mb-0">Cap/Recurso</label>
                            {!! Form::select('CapRecursos', [
                                'NO' => 'NO',
                                'SI' => 'SI',
                                ],null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="form-group">
        <!-- ['class' => 'form-control','readonly'] -->
            {{ Form::label('name', 'Codigo') }}
            {{ Form::text('Codigo',$codigo, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('Tipo de Activo', 'activo') }}
            {!! Form::select('IdTAct',$tipo_activos, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Marca') }}
            {{ Form::text('Marca', null , ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-lg-5 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Modelo') }}
            {{ Form::text('Modelo', null , ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-lg-7 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Nro. Serial') }}
            {{ Form::text('NroSerial', null , ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Condicion') }}
            {!! Form::select('Condicion', [
            'adecuado' => 'ADECUADO',
            'req_man' => 'REQUIERE MANTENIMIENTO',
            'dañado' => 'DAÑADO',
            'baja' => 'BAJA',
            'no_encontrado' => 'NO ENCONTRADO',
            ],null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            {{ Form::label('name', 'Observaciones') }}
            {{ Form::textarea('Observaciones', null, [
                        'class'      => 'form-control',
                        'rows'       => 6,
                        'name'       => 'Observaciones',
                        'id'         => 'Observaciones',
                        'onkeypress' => "return nameFunction(event);"
                    ])}}
        </div>
    </div>
</div>
<br>
<div class="d-flex justify-content-end">
    <div class="form-group pr-2">
        <a href="{{route('activos.index')}}" class="btn btn-outline-info btn_activo_save">
            Cancelar
        </a>
    </div>
    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-outline-success btn_activo_save']) }}
    </div>
</div>
{!! Form::close() !!}
