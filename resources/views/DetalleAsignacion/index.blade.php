
 @extends('layouts.app')
 @section('content')
     <div class="row px-3 py-4">
         <div class="col-sm-6">
             <div class="d-flex justify-content-start pb-2">
                 <h1 class="text-info text-lg mb-0"><strong>Asignación de Activos</strong></h1>
             </div>
         </div>
         <div class="col-6">
             <div class="d-flex justify-content-end ">
                 @can('asignaciones.create')
                     <a href="{{ route('asignaciones.create') }}" class="btn  btn-primary mr-2">
                         Nueva Asginación
                     </a>
                 @endcan
                {{-- @can('asignaciones.create')
                     <a  href="{{ route('asignaciones.create') }}"  data-bs-toggle="modal" id="miBoton" data-bs-target="#exampleModal"
                         class="btn  btn-primary mr-2">

                         Buscar
                     </a>
                 @endcan--}}
             </div>
         </div>
     </div>
     <div class="container-fluid shadow-sm p-3 mb-5 bg-white rounded">
         <div class="table-responsive-lg">
             <table id="miTabla" class="table table-striped table-hover ">
                 <thead>
                     <tr>
                         <th>Código</th>
                         <th>Activo</th>
                         <th>Usuario Asignado</th>
                         <th>Empresa</th>
                         <th>Oficina</th>
                         {{-- <th>Departamento</th> --}}
                         {{-- <th>Fecha Inicial</th> --}}
                         {{-- <th>Fecha Final</th> --}}
                         <th width="">Captura de Recurso</th>
                         <th  width="8%">Acciones</th>
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
                             {{-- <td>{{ $detalle_asginacion->departamento }}</td> --}}
                             {{-- <td>{{ $detalle_asginacion->fecha_i }}</td> --}}
                             {{-- <td>{{ $detalle_asginacion->fecha_f }}</td> --}}
                             <td>{{ $detalle_asginacion->CapRecursos }}</td>
                             @can('asignaciones.show')
                                 <td>
                                    <div style="display: flex;
                                    align-items: center;
                                    justify-content: center;">
                                     <a  href="{{ route('asignaciones.show', [
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
                                </div>
                                 </td>
                             @endcan
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
     </div>


     <!-- Modal -->
     {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" style="max-width: 70%">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Buscar asignación</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <table id="miTabla" class="table  table-bordered" style="margin-left: 0px;">
                         <thead>
                             <tr>
                                 <th>Código</th>
                                 <th>Activo</th>
                                 <th style="max-width: 5%;">Acciones</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($detalle_asginacions as $detalle_asginacion)
                                 <tr>
                                     <td>{{ $detalle_asginacion->Codigo }}</td>
                                     <td>{{ $detalle_asginacion->activo }}</td>
                                     <td class="fly">
                                         <a class="btn-sm btn btn btn-warning btn-edit"
                                             data-code={{ $detalle_asginacion->IdE }}
                                             data-coder={{ $detalle_asginacion->IdO }}
                                             data-coderr={{ $detalle_asginacion->IdD }}
                                             data-coderrr={{ $detalle_asginacion->IdAct }}>
                                             <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                 class="bi bi-pencil-square" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                 <path
                                                     d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                 <path fill-rule="evenodd"
                                                     d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                             </svg>
                                         </a>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div> --}}
     <script>
         var url = "{{ route('editions') }}";
         var csrfToken = $('meta[name="csrf-token"]').attr('content');
         $('#miTabla tbody').on('click', 'a.btn-edit', function() {
             // var data = table.row($(this).closest('tr')).data();
             var id = $(this).data('code');
             var id2 = $(this).data('coder');
             var id3 = $(this).data('coderr');
             var id4 = $(this).data('coderrr');
             //  console.log(id, id2, id3, id4);

             // Aquí puedes agregar la lógica para editar el registro con el ID correspondiente
             //  alert('Botón de actualización presionado para el ID: ' + id + "*" + id2 + "*" + id3 + "*" + id4);
             $.ajax({
                 url: url,
                //  headers: {'X-CSRF-TOKEN': $("#token").val()},
                 type: 'post',
                 dataType: 'json',
                 data: {
                    _token: csrfToken,
                     IdE: id,
                     IdO: id2,
                     IdD: id3,
                     IdAct: id4
                 },
                 complete: function() {
                     // hidePleaseWaitModal(false);

                 },
                 async: true,
                 success: function(data) {
                    window.location.href = data.url;
                 }
             });
         });
     </script>
 @endsection
