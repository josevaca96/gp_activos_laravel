
<div class="text-center">
    <h1 class="pt-5 t-principal m-0">Fomulario de Activos</h1>
</div>
<hr>
<div class="row pt-4">
    <div class="col-lg-4 col-sm-12">
        <div class="form-group">

            {{ Form::label('name', 'Codigo') }}
            {{ Form::text('Codigo',null, ['class' => 'form-control','disabled'=>'true']) }}
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
    <div class="form-group pr-2" >
        <a href="{{route('activos.index')}}"
            class="btn btn-outline-info btn_activo_save">
                Cancelar
        </a>
    </div>
    <div class="form-group" >
        {{ Form::submit('Guardar', ['class' => 'btn btn-outline-success btn_activo_save']) }}
    </div>
</div>



