<div class="row">
    <div class="col-4">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('name', 'Nombre') }}
                {{ Form::text('name', null , ['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::label('slug', 'URL amigable') }}
                {{ Form::text('slug', null , ['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Descripción') }}
                {{-- {{ Form::textarea('description', null , ['class' => 'form-control']) }} --}}
    
                {{Form::textarea('description', null, [
                    'class'      => 'form-control',
                    'rows'       => 4, 
                    'name'       => 'description',
                    'id'         => 'description',
                    'onkeypress' => "return nameFunction(event);"
                ]) }}
           </div>
        </div>
    </div>
        <div class="col-md-8">
            <h3>Permiso especial</h3>
            <div class="form-group">
                <label>{{Form::radio('special', 'all-access')}} Acceso total</label>
                <label>{{Form::radio('special', 'no-access')}} Sin Acceso </label>
            </div>
            <h3>Lista de Permisos</h3>
    
            <p>
                <div class="d-grid gap-2">
                    <a class="btn btn-primary "
                     data-bs-toggle="collapse"
                     href="#collapseExample" 
                     role="button"
                     aria-expanded="false"
                     aria-controls="collapseExample">Mostrar lista de opciones ▼
                </a>                      
                </div>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="form-group">
                        <ul class="list-unstyled"></ul>
                            @foreach($permissions as $permission)
                                <li>
                                    <label>
                                        {{Form::checkbox('permissions[]' , $permission->id, null)}}
                                        {{$permission->name}}
                                        <em>({{$permission->description ?: 'Sin descripción'}})</em>
                                    </label>
                                </li>        
                            @endforeach               
                    </div>
                </div>
            </div> 
        </div>
      
</div>




<hr>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>


