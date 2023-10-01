    <style>.ui-autocomplete.ui-menu li {
        color: gray; /* Cambia "red" al color que desees */
        }
        .btn-outline-light svg {
            fill: gray; /* Cambia "gray" al color gris que desees */
        }

    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $('#tags').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{route('search_client')}}",
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
<div class="">
    <h5 class="pt-5  m-0">NUEVA ASIGNACIÓN</h5>
</div>
<br><br>
<div class="row">
    <div class="col-8">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="row pt-4">
                {{-- <div class="col-lg col-sm-12">
                    <div class="form-group">

                        {{ Form::label('nombre', 'Usuario asignado') }}
                        {!! Form::text('usuario_asig', null, ['id' => 'tags', 'class' => 'form-control', 'placeholder' => 'Escriba un usuario..']) !!}
                    </div>
                </div> --}}
                <div class="col-12">
                    <div class="form-group">
                        {{ Form::label('name', 'Descripción') }}
                         {{ Form::textarea('Descripcion', null, [
                                'class'      => 'form-control',
                                'rows'       => 4,
                                'name'       => 'Descripcion',
                                'id'         => 'Descripcion'
                            ])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="row p-2">
                <div class="col-lg col-sm-12">
                    <div class="form-group">
                        <div class="d-flex justify-content-between pb-3">
                            <label class="d-flex align-items-center" for="">Usuario asignado</label>
                           <a title="Esta es la leyenda que se mostrará al hacer hover"  href="#"
                                class="btn btn-outline-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                  </svg>
                            </a>
                        </div>
                        {!! Form::text('usuario_asig', null, ['id' => 'tags', 'class' => 'form-control', 'placeholder' => 'Escriba un usuario..']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <br>
<div class="d-flex justify-content-end">
    <div class="form-group pr-2" >
        <a href="{{route('oficinas.index')}}"
            class="btn btn-outline-info btn_activo_save">
                Cancelar
        </a>
    </div>
    <div class="form-group" >
        {{ Form::submit('Guardar', ['class' => 'btn btn-outline-success btn_activo_save']) }}
    </div>
</div>


