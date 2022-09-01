<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{asset('js/reporte.js')}}"></script>
    <script>
    $(function() {
        $('#tags').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('reporteg')}}",
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data)
                    }
                });
            }
        });
    });
    </script>
</head>

<body>
    <div class="container certer_content">
        <div class="card shadow p-3 mb-5 bg-body rounded"  style="width: 800px;">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center">
                    <img src="https://soporte.grupopaz.com.bo/scp/logo.php?1637247345" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8 px-3">
                    <div class="card-body">
                    <center><h4 class="card-title pb-4">GENERAR REPORTE</h4></center>
                        <form class="" action="{{route('mostrar_reporte.index')}}" method="get">
                            <div class="form-group">
                                <label for="tags">Usuario asignado: </label>
                                <input id="tags" name="usuario_asig" class="form-control"
                                    placeholder="Escriba un usuario..">

                                <label for="tags">Empresa: </label>
                                <select name="empresa" id="" class="form-control">
                                    <option value="">todas las empresas</option>
                                    @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}">{{$empresa->Nombre}}</option>
                                    @endforeach
                                </select>


                                <label for="tags">Activo: </label>
                                <select name="activo" id="" class="form-control">
                                    <option value="">Todos los activos</option>
                                    @foreach($tipo_activos as $tipo_activo)
                                    <option value="{{$tipo_activo->id}}">{{$tipo_activo->Nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <center>
                                    <div class="row" style="padding:15px 60px 0 60px;">
                                        <button class="btn btn-sm btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
</svg>Generar Pdf</button>
                                    </div>
                                </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>