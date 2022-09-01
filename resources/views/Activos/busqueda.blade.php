<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo Paz</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset('plugins/DataTables/datatables.min.css')}}" rel="stylesheet">
    <!-- datatable -->
    


</head>
<body>    
    <div class="container shadow p-3 mb-5 bg-white rounded">
        <div class="table-responsive-lg">
            <table id="activos" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Serial</th>
                        <th>Activo</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activos as $activo)
                    <tr>
                        <td>{{$activo->Codigo}}</td>
                        <td>{{$activo->NroSerial}}</td>
                        <td>{{$activo->activo}}</td>
                        <td>{{$activo->Modelo}}</td>
                        <td>{{$activo->Marca}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{asset('plantilla/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plantilla/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('js/myjs.js')}}"></script>
    <script>
        $(document).ready(function() {
    $('#activos').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Items",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});

    </script>
</body>
</html>