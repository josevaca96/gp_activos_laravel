@extends('layouts.app')
@section('content')
<div class="panel-body shadow p-3 mb-5 bg-white rounded">
                <div class="table-responsive-lg">
                    <table id="activos_search" class="table table-striped table-hover ">
                        <thead>
                           <tr> 
                                <th>Codigo</th>
                                <th>Nombre de Activo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Nroserial</th>
                                <th>Oficina</th>
                                <th>UsuarioAsig</th>
                                <th>Empresa</th>
                            </tr>
                            </thead>
                        <tbody>
                            @foreach($activos as $activo)
                                <tr>
                                    <!-- <td>{{$activo->id}}</td> -->
                                    <td>{{$activo->Codigo}}</td>
                                    <td>{{$activo->NombreActivo}}</td>
                                    <td>{{$activo->Marca}}</td>
                                    <td>{{$activo->Modelo}}</td>
                                    <td>{{$activo->NroSerial}}</td>
                                    <td>{{$activo->Oficina}}</td>
                                    <!-- <td>{{$activo->Condicion}}</td> -->
                                    <td>{{$activo->UsuarioAsig}}</td>
                                    <!-- <td>{{$activo->Observaciones}}</td> -->
                                    <!-- <td>{{$activo->CapRecursos}}</td> -->
                                    <td>{{$activo->Empresa}}</td>                                   
                                </tr>
                            @endforeach
                        </tbody>                        
                    </table>
        
                    @endsection