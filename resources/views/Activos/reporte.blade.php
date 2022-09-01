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
                            </tr>
                            </thead>
                        <tbody>
                            @foreach($activos as $activo)
                                <tr>
                                    <td>{{$activo->Codigo}}</td>
                                    <td>{{$activo->NombreActivo}}</td>
                                    <td>{{$activo->Marca}}</td>
                                    <td>{{$activo->Modelo}}</td>
                                    <td>{{$activo->NroSerial}}</td>
                                </tr>
                            @endforeach
                        </tbody>                        
                    </table>
        
                    @endsection