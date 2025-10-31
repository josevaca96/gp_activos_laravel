<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Grupo Paz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css"> --}}
    {{-- <link href="{{asset('plantilla/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.1.0/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
    <link href="{{asset('plantilla/lib/animate-css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('plantilla/img/logo2.png') }}" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('css/frm-activos.css') }}">
    <link href="{{asset('plugins/DataTables/datatables.min.css')}}" rel="stylesheet">
    @livewireStyles
</head>
