 @extends('layouts.app')
 @section('content')
     <div class="container-fluid shadow-sm p-3 mb-5 bg-white rounded">
         <div class="row">
             <div class="col-sm-6">
                 <div class="d-flex justify-content-start pb-2">
                     <h2 class="text-info mb-0"><strong>Asignación de Activos</strong></h2>
                 </div>
             </div>
             <div class="col-6">
                 <div class="d-flex justify-content-end pb-2">
                     @can('asignaciones.create')
                         <a href="{{ route('asignaciones.create') }}" class="btn btn-sm btn-primary mr-2">
                             Crear
                         </a>
                     @endcan
                 </div>
             </div>
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
                     @foreach ($detalle_asginacions as $detalle_asginacion)
                         <tr>
                             <td>{{ $detalle_asginacion->Codigo }}</td>
                             <td>{{ $detalle_asginacion->activo }}</td>
                             <td>{{ $detalle_asginacion->UsuarioAsig }}</td>
                             <td>{{ $detalle_asginacion->empresa }}</td>
                             <td>{{ $detalle_asginacion->Direccion }}</td>
                             <td>{{ $detalle_asginacion->departamento }}</td>
                             <td>{{ $detalle_asginacion->fecha_i }}</td>
                             <td>{{ $detalle_asginacion->fecha_f }}</td>
                             <td>{{ $detalle_asginacion->CapRecursos }}</td>
                             @can('asignaciones.show')
                                 <td class="fly">
                                     <a href="{{ route('asignaciones.show', [
                                         'IdE' => $detalle_asginacion->IdE,
                                         'IdO' => $detalle_asginacion->IdO,
                                         'IdD' => $detalle_asginacion->IdD,
                                         'IdAct' => $detalle_asginacion->IdAct,
                                     ]) }}"
                                         class="btn-sm btn btn-success">
                                         <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                             <path fill-rule="evenodd"
                                                 d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                         </svg>
                                     </a>
                                 </td>
                             @endcan
                             @can('asignaciones.edit')
                                 <td class="fly">
                                     <a href="{{ route('asignaciones.edit', [
                                         'IdE' => $detalle_asginacion->IdE,
                                         'IdO' => $detalle_asginacion->IdO,
                                         'IdD' => $detalle_asginacion->IdD,
                                         'IdAct' => $detalle_asginacion->IdAct,
                                     ]) }}"
                                         class="btn-sm btn btn btn-warning">
                                         <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                 d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                             <path fill-rule="evenodd"
                                                 d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                         </svg>
                                     </a>
                                 </td>
                             @endcan
                             @can('asignaciones.destroy')
                                 <td class="fly">
                                     {!! Form::open([
                                         'route' => [
                                             'asignaciones.destroy',
                                             $detalle_asginacion->IdE,
                                             $detalle_asginacion->IdO,
                                             $detalle_asginacion->IdD,
                                             $detalle_asginacion->IdAct,
                                         ],
                                         'method' => 'DELETE',
                                     ]) !!}

                                     <button class="btn btn-sm btn-danger">
                                         <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd"
                                                 d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                         </svg>
                                     </button>
                                     {!! Form::close() !!}
                                 </td>
                             @endcan
                         </tr>
                     @endforeach
                 </tbody>
             </table>
             <div class="d-flex flex-row-reverse px-3">
                 {{ $detalle_asginacions->render() }}
             </div>
         </div>
     </div>
 @endsection
