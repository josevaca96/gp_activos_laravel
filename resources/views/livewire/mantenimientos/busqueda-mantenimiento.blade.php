<div>
    @extends('layouts.app')
 @section('content')
     <div class="container-fluid shadow-sm p-3 mb-5 bg-white rounded">
         <h1 class="text-info mb-0"><strong>Mantenimientos</strong></h1>
         <p class="px-2 text-info mb-0">Busqueda rápida</p>
         <div class="panel-body shadow p-3 mb-5 bg-white rounded">
             <div class="table-responsive-lg">
                 <table id="activos" class="table table-striped table-hover ">
                     <thead>
                         <tr>
                             {{-- <th>ID</th> --}}
                             <th> Código</th>
                             <th>Tipo Activo</th>
                             <th>mantenimiento</th>
                             <th>próximo mantenimiento</th>
                             <th>Descripción</th>
                             <th>Aprob.</th>
                             <th colspan="3" width="8%">Acciones</th>
                         </tr>
                     </thead>

             </div>
         </div>
     </div>
 @endsection

</div>
