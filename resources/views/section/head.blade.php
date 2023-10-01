<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Grupo Paz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('plantilla/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/lib/animate-css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('plantilla/img/logo2.png') }}" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('css/frm-activos.css') }}">
    @livewireStyles
    {{--
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
        <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    --}}
    <script src="{{ asset('plugins/DataTables/jQuery-3.7.0/jquery-3.7.0.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script>$(document).ready(function() {
         var table = $('#miTabla').DataTable({
                "scrollY": "400px",
                "pageLength": 50,
                "autoWidth": true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    }
            });
        // Agrega un evento de clic al botón de actualización
        // $('#miTabla tbody').on('click', 'a.btn-edit', function() {
        //     // var data = table.row($(this).closest('tr')).data();
        //     var id = $(this).data('code');
        //     var id2 = $(this).data('coder');
        //     var id3 = $(this).data('coderr');
        //     var id4 = $(this).data('coderrr');
        //     console.log(id,id2,id3,id4);

        //     // Aquí puedes agregar la lógica para editar el registro con el ID correspondiente
        //     alert('Botón de actualización presionado para el ID: ' +id+"*"+id2+"*"+id3+"*"+id4);
        // });
         // Agregar un oyente para el evento shown.bs.modal del modal
    $('#exampleModal').on('shown.bs.modal', function() {
        // Recalcular los anchos de las columnas
        table.columns.adjust().draw();
    });

    });
    </script>
</head>
