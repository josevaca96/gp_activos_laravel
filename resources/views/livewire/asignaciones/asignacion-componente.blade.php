<div>
    @include('activos.error')
    {!! Form::open( ['route' => 'asignaciones.store']) !!}
    <div class="text-center pt-2">
        <h1>Formulario de Asignación</h1>
    </div>
    <div class="row mx-0">
        <div class="card col-5 shadow mx-5 mb-5 bg-body rounded">
            <div class="row p-3">
                <div class="col-12 p-2">
                    <div class="row">
                        <div class="col-4">
                            {{ Form::label('activo', 'Código') }}
                            <input name="IdAct" type="text" style="display:none" class="form-control"
                                wire:model="id_act">
                            <input type="text" class="form-control" wire:model="codigo" readonly>
                        </div>
                        <div class="col-2">
                            {{ Form::label('activo', 'Activo') }}
                            <input type="text" class="form-control" wire:model="activo" disabled>
                        </div>
                        <div class="col-5">
                            {{ Form::label('activo', 'Serial') }}
                            <input type="text" class="form-control" wire:model="serial" disabled>
                        </div>
                        <div class="col-4">
                            {{ Form::label('activo', 'Modelo') }}
                            <input type="text" class="form-control" wire:model="modelo" disabled>
                        </div>
                        <div class="col-8">
                            {{ Form::label('empresa', 'Empresa') }}
                            {!! Form::select('IdE',$empresas, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 p-2">
                    {{ Form::label('oficina', 'Oficina') }}
                    {!! Form::select('IdO',$oficinas, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-6 p-2">
                    {{ Form::label('departamento', 'Departamento') }}
                    {!! Form::select('IdD',$departamentos, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-6 p-2">
                    <label for="" class="mb-0">Cap/Recurso</label>
                    {!! Form::select('CapRecursos', [
                    'NO' => 'NO',
                    'SI' => 'SI',
                    ],null,['class' => 'form-control']) !!}
                </div>
                <div class="col-6 p-2">
                    <label for="" class="mb-0">Fecha Inicio</label>
                    {{Form::date('fecha_i', \Carbon\Carbon::now(),['class' => 'form-control'])}}
                </div>
                <div class="col-6 p-2">
                    <label for="" class="mb-0">Fecha Fin</label>
                    {{Form::date('fecha_f',null,['class' => 'form-control','placeholder' =>'dd/mm/aaaa'])}}
                </div>
                <div class="col-12 p-2">
                    <label for="" class="mb-0">Ususario Asignado</label>
                    {{ Form::text('UsuarioAsig', null , ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="d-flex flex-row">
                <div class="form-group px-3">
                    <a href="{{route('asignaciones.index')}}" class="btn btn-outline-info btn_activo_save">
                        Cancelar
                    </a>
                </div>
                <div class="form-group">
                    {{ Form::submit('Guardar', ['class' => 'btn btn-outline-success btn_activo_save']) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <!-- table -->
        <div class="card col-6 shadow p-3 mb-5 bg-body rounded ">
            <div class="row">
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
                        @foreach($activos_all as $activo)
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
                <!-- @if ($search != "")
                        <div class="d-flex flex-row-reverse px-3">
                            {{$activos_all->render()}}
                        </div>
                    @endif -->
            </div>
        </div>
    </div>

</div>