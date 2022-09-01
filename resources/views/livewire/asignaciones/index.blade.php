<style>
    nav svg {
        height:20px;
    }
    nav p{
        margin:4px;
    }
    nav .flex-1{
        display:none;
    }
    nav p{
        display:none;
    }
</style>
<div class="container-fluid">
    <h1 class="text-secondary pt-4">Listado de Asginaciones</h1>
    <div class="panel-body shadow p-3 mb-5 bg-white rounded">
        <div class="d-flex justify-content-end pb-2">
                <a href="{{route('asignaciones.create')}}" class="btn btn-sm btn-primary mr-2">
                     Crear Asignación
                </a>
                <a href="{{route('pdf_asignaciones')}}" class="btn btn-sm btn-primary">
                     REPORTE-PDF2
                </a>
        </div>
        <div class="table-responsive-lg">
            <table id="activos" class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Activo</th>
                        <th>Usuario Asignado</th>
                        <th>Empresa</th>
                        <th>Oficina</th>
                        <th>Departamento</th>
                        <th>Fecha Inicial</th>
                        <th>Fecha Final</th>
                        <th>Captura de Recurso</th>
                        <th colspan="3" width="8%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asignaciones as $asignacion)
                    <tr>
                        <td>{{$asignacion->Codigo}}</td>
                        <td>{{$asignacion->activo}}</td>
                        <td>{{$asignacion->UsuarioAsig}}</td>
                        <td>{{$asignacion->empresa}}</td>
                        <td>{{$asignacion->Direccion}}</td>
                        <td>{{$asignacion->departamento}}</td>
                        <td>{{$asignacion->fecha_i}}</td>
                        <td>{{$asignacion->fecha_f}}</td>
                        <td>{{$asignacion->CapRecursos}}</td>
                        <td class="fly">
                            <a href="{{route('asignaciones.show',[
                                                            'IdE'   => $asignacion->IdE,
                                                            'IdO'   => $asignacion->IdO,
                                                            'IdD'   => $asignacion->IdD,
                                                            'IdAct' => $asignacion->IdAct

                                                        ])}}" class="btn-sm btn btn-success">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </a>
                        </td>
                        <td class="fly">
                            <button wire:click="edit(
                                                        '{{$asignacion->IdE}}',
                                                        '{{$asignacion->IdO}}',
                                                        '{{$asignacion->IdD}}',
                                                        '{{$asignacion->IdAct}}'
                                                )"
                                     class="btn-sm btn btn btn-warning">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </button>
                            @include('livewire.asignaciones.edit')
                            
                        </td>
                        <td class="fly">
                       
                            <button wire:click="destroy(
                                                            {{$asignacion->IdE}},
                                                            {{$asignacion->IdO}},
                                                            {{$asignacion->IdD}},
                                                            {{$asignacion->IdAct}}
                                                        )"
                                     class="btn btn-sm btn-danger">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{$asignaciones->links()}}
            </div>
                
        </div>
    </div>
</div>