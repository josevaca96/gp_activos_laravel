<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Grupo Paz</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('plantilla/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/lib/animate-css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('plantilla/img/logo2.png') }}" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('css/frm-activos.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">  --}}
    {{-- <link href="{{asset('plugins/DataTables/DataTables/datatables.min.css')}}" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">
    @livewireStyles
</head>
