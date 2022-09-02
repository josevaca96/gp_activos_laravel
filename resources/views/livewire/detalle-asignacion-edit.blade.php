<div>
    <h3 class="content-titulo">Editar Asignación</h3>
    <div class="row shadow p-3 mb-5 bg-body rounded">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="row p-5">
                        <div class="col-5 pt-2">
                            {{-- {{ Form::label('empresa', 'Empresa') }} --}}
                            <input type="text" name="ide2" value="{{$v_ant_ide}}" class="form-control" style="display:none;">
                            {{-- {!! Form::select('IdE',$empresas,$var_IdE, ['class' => 'form-control', 'Disabled']) !!} --}}
                            <input type="text" name="IdE" class="form-control" wire:model="var_IdE" style="display:none;" >
                        </div>
                        <div class="col-7 pt-2">
                            {{-- {{ Form::label('departamento', 'Departamento') }} --}}
                            <input type="text" name="idd2" value="{{$v_ant_idd}}" class="form-control" style="display:none;">
                            {{-- {!! Form::select('IdD',$departamentos,$var_IdD, ['class' => 'form-control', 'Disabled']) !!} --}}
                            <input type="text" name="IdD" class="form-control" wire:model="var_IdD" style="display:none;" >

                        </div>
                        <div class="col-12 pt-2">
                            {{-- {{ Form::label('oficina', 'Oficina') }} --}}
                            <input type="text" name="ido2" value="{{$v_ant_ido}}" class="form-control" style="display:none;">
                            {{-- {!! Form::select('IdO',$oficinas,$var_IdO, ['class' => 'form-control', 'Disabled']) !!} --}}
                            <input type="text" name="IdO" class="form-control" wire:model="var_IdO" style="display:none;" >

                        </div>

                        <div class="col-4 pt-2">
                            {{ Form::label('activo', 'Código') }}
                            <input type="text" name="idact2" value="{{$v_ant_idact}}" class="form-control" style="display:none;">
                            <input name="IdAct" type="text" style="display:none;"  class="form-control" wire:model="var_IdAct">
                            <input type="text" class="form-control" wire:model="Codigo" readonly>
                        </div>
                        <div class="col-8 pt-2">
                            {{ Form::label('NroSerial', 'Serial') }}
                            <input type="text" class="form-control" wire:model="NroSerial" readonly>
                        </div>
                        <div class="col-3 pt-2">
                            <label for="" class="mb-0">Cap/Recurso</label>
                            {!! Form::select('CapRecursos', [
                            'NO' => 'NO',
                            'SI' => 'SI',
                            ],$CapRecursos,['class' => 'form-control']) !!}
                        </div>
                        <!-- \Carbon\Carbon::now() -->
                        <div class="col-4 pt-2">
                            <label class="mb-0">Fecha Inicio</label>
                            {{Form::date('fecha_i',$fecha_i ,['class' => 'form-control'])}}
                        </div>
                        <div class="col-4 pt-2">
                            <label for="" class="mb-0">Fecha Fin</label>
                            {{Form::date('fecha_f',$fecha_f,['class' => 'form-control'])}}
                            <!-- {{Form::date('fecha_f',$fecha_f,['class' => 'form-control','placeholder' =>'dd/mm/aaaa'])}} -->
                        </div>
                        <div class="col-12 pt-2 pb-3">
                            <label for="" class="mb-0">Ususario Asignado</label>
                            {{ Form::text('UsuarioAsig', $UsuarioAsig , ['class' => 'form-control']) }}
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="form-group pr-2">
                                <a href="{{route('asignaciones.index')}}" class="btn btn-outline-info btn_activo_save">
                                    Cancelar
                                </a>
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Guardar', ['class' => 'btn btn-outline-success btn_activo_save']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- segunda columna -->
        {{-- <div class="col-5">
            <div class="row">
                <div class="col-12">
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
            </div>
        </div> --}}
    </div>
</div>
