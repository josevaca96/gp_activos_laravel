<div>
    @include('activos.error')
    <div class="float-end"><button class="btn btn-success" wire:click="guardar">Guardar</button></div>
    <div class="row">
        <div id="heading">
            <div>
                <h4 class="mb-0">Nuevo Mantenimiento</h4>
                <p class="text-muted pl-1 mb-0">Estimación de 6 meses</p>
            </div>
            <div>
                <img src="{{ asset('img/logo_man_mod.png') }}" class="logo_guide" alt="">
            </div>
        </div>
    </div>
    <hr class="m-0">
    <main class="pt-3">
        <div class="row itm">
            <div class="col-3">
                <label for="" class="mb-0">Código</label>
                <input type="text" class="form-control" wire:model="obj_activo.Codigo" readonly>
            </div>
            <div class="col-4">
                <label for="" class="mb-0">Activo</label>
                <input type="text" class="form-control" wire:model="nombre_activo" readonly>
            </div>
            <div class="col-4">
                <label for="" class="mb-0">Serial</label>
                <input type="text" class="form-control" wire:model="obj_activo.NroSerial" readonly>
            </div>
            <div class="col-4">
                <label for="" class="mb-0">Fecha de Mantenimiento</label>
                {{ Form::date('FechaMant',null, ['class' => 'form-control','wire:model' => 'obj_mantenimiento.FechaMant','wire:change'=>"change_fechP" ]) }}
            </div>
            <div class="col-4">
                <label for="" class="mb-0">Proximo Mantenimiento</label>
                {{ Form::date('FechaMantProxi', null, ['class' => 'form-control','wire:model' => 'obj_mantenimiento.FechaMantProxi','id' => 'FechaMantProxi','readonly']) }}
            </div>
            <div class="col-3 ">
                    <label for="" class="mb-0">Aprobación de Mantenimiento</label>
                    {!! Form::select('Test', [ '' => 'Seleccione un opción',1 => 'SI', 0  => 'NO',],null,['class' => 'form-control','wire:model' => 'obj_mantenimiento.Test']) !!}

            </div>
            <div class="col-12">
                <label for="" class="mb-0">Descripción</label>
                {{ Form::textarea('Descripcion', null, [
                    'class' => 'form-control',
                    'rows' => 2,
                    'name' => 'Descripcion',
                    'id' => 'Descripcion',
                    'wire:model' => 'obj_mantenimiento.Descripcion'
                ]) }}
            </div>
            {{-- table --}}
            <div class="row ">
                <div class="col-6">
                    <label> Buscar</label>
                    <input wire:model="search" type="text" placeholder="Buscar por: activo,marca,modelo"
                        class="form-control">
                </div>
            </div>
            <div class="table-responsive-lg">
                <table id="" class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre de Activo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Nroserial</th>
                            <th colspan="3" width="8%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($search != "")
                        @foreach($activos as $activo)
                        <tr>
                            <td>{{$activo->Codigo}}</td>
                            <td>{{$activo->activo}}</td>
                            <td>{{$activo->Marca}}</td>
                            <td>{{$activo->Modelo}}</td>
                            <td>{{$activo->NroSerial}}</td>
                            <td class="fly">
                                <a class="btn-sm btn btn-outline-success"
                                    wire:click="Cap_act({{$activo->id}},'{{$activo->Codigo }}','{{$activo->activo }}','{{$activo->NroSerial}}','{{$activo->Modelo}}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
