<!-- tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h2" id="exampleModalLabel">Editar Asignación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2">
                        {{ Form::label('empresa', 'Empresa') }}
                        {!! Form::select('IdE',$empresas,$var_IdE, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-4">
                        {{ Form::label('empresa', 'Oficina') }}
                        {!! Form::select('IdO',$oficinas,$var_IdO, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-2">
                        {{ Form::label('departamento', 'Departamento') }}
                        {!! Form::select('IdD',$departamentos,$var_IdD, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-2">
                        {{ Form::label('activo', 'Código') }}
                        <input name="IdAct" type="text" style="display:none" class="form-control" wire:model="id_act">
                        <input type="text" class="form-control" wire:model="Codigo" readonly>
                    </div>
                    <div class="col-2 p-2">
                        <label for="" class="mb-0">Cap/Recurso</label>
                        {!! Form::select('CapRecursos', [
                        'NO' => 'NO',
                        'SI' => 'SI',
                        ],null,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-3">
                        {{ Form::label('NroSerial', 'Serial') }}
                        <input type="text" class="form-control" wire:model="NroSerial" readonly>
                    </div>
                    <div class="col-2 p-2">
                        <label for="" class="mb-0">Fecha Inicio</label>
                        {{Form::date('fecha_i', \Carbon\Carbon::now(),['class' => 'form-control'])}}
                    </div>
                    <div class="col-2 p-2">
                        <label for="" class="mb-0">Fecha Fin</label>
                        {{Form::date('fecha_f',null,['class' => 'form-control','placeholder' =>'dd/mm/aaaa'])}}
                    </div>
                    <div class="col-5 p-2">
                        <label for="" class="mb-0">Ususario Asignado</label>
                        {{ Form::text('UsuarioAsig', null , ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="card col-12 shadow p-3 mb-5 bg-body rounded ">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>