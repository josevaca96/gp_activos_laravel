
<div class="text-center">
    <h1 class="pt-5 t-principal m-0">Fomulario de Activos</h1>
</div>
<hr>
<div class="row pt-4">
    <div class="col-lg-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Codigo') }}
            {{ Form::text('Codigo',null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Nombre Activo') }}
            {!! Form::select('NombreActivo', [
                'laptop' => 'LAPTOP',
                'cargador' => 'CARGADOR',
                'teclado' => 'TECLADO',
                'mouse' => 'MOUSE',
                'pc-escritorio' => 'PC-ESCRITORIO',
                'impresora' => 'IMPRESORA',
                'monitor' => 'MONITOR',
                'tv-plasma' => 'TV-PLASMA',
                'proyector' => 'PROYECTOR',
                'parlantes' => 'PARLANTES',
                'scanner' => 'SCANNER',
                'telefono' => 'TELEFONO',
                'auriculares' => 'AURICULARES',
                'etiquetadora' => 'ETIQUETADORA',
                'usb' => 'USB',
                'camara-web' => 'CAMARA WEB',
                'adaptador' => 'ADAPTADOR',
                'bateria' => 'BATERIA',
                'switch' => 'SWITCH',
                'camara_seguridad' => 'CAMARA DE SEGURIDAD',
                'modem' => 'MODEM',
                'control_remoto' => 'CONTROL REMOTO',
                'cloud_key' => 'CLOUD KEY',
                'pizarra_digital' => 'PIZARRA DIGITAL',
                'toner' => 'TONER',
                'poe' => 'POE',
                'transformador-telefono' => 'TRANSFORMADOR DE TELEFONÍA',
                'router' => 'ROUTER',
                'disco-solido' => 'DISCO SOLIDO',
                'disco-duro' => 'DISCO DURO',
                'papel' => 'PAPEL',
                'soporte-tv' => 'SOPORTE TV',
                'usb-vga' => 'USB-VGA',
                'cargador-bateria' => 'GARGADOR DE BATERIA',
                'bluetooth' => 'BLUETOOTH',
                'convertidor-pop' => 'CONVERTIDOR POP',
                'ups' => 'UPS',
                'Fuente-alimentacion' => 'FUENTE DE ALIMENTACIÓN',

                ],null,['class' => 'form-control']) !!}
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
            {{ Form::label('name', 'Oficina') }}
            {{ Form::text('Oficina', null , ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Condicion') }}
            {!! Form::select('Condicion', ['adecuado' => 'ADECUADO', 'req_man' => 'REQUIERE MANTENIMIENTO','dañado' => 'DAÑADO','baja' => 'BAJA'],null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Usuario Asignado') }}
            {{ Form::text('UsuarioAsig', null , ['class' => 'form-control']) }}
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
                ])}}
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Captura de Recursos') }}
            {!! Form::select('CapRecursos', ['si' => 'SI', 'no' => 'NO'],null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Empresa') }}
            {!! Form::select('Empresa', [
                    'celina' => 'CELINA',
                    'pacucito' => 'PACUCITO',
                    'galileo' => 'GALILEO',
                    'ticketeg' => 'TICKETEG',
                    'multipago' => 'MULTIPAGO'
                    
                ],null,['class' => 'form-control']) !!}
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

    
    
