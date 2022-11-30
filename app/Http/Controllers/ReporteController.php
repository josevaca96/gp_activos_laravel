<?php

namespace App\Http\Controllers;
use App\Asignacion;
use App\Empresa;
use App\TipoActivo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(){
        return view('reportes.index');
    }
    public function reporte_principal(Request $request){
        // mandar los datos devuelta a las cajas

        $empresas = Empresa::all();
        $tipo_activos = TipoActivo::all();
        $cant_item=0;
        return view('reportes.principal', compact('empresas','tipo_activos','cant_item'));
    }
     public function traer_usuario_asig(Request $request){
        $term = $request->get('term');
        $querys = DB::table('detalle_asignacions')
            ->select('UsuarioAsig')
            ->where('UsuarioAsig','LIKE', '%'.$term . '%')->distinct()->get();
            $data = [];
        foreach($querys as $query){
            $data[] = [
                'label' => $query->UsuarioAsig
            ];
        }
        return $data;
    }
    public function mostrar_reporte(Request $request){
        $reportes= $this->collection_option($request);
        $cant_item=0;
        if(empty($reportes)==false){
            $cant_item= count($reportes);
        }
        $request2=$request;
        $empresas = Empresa::all();
        $tipo_activos = TipoActivo::all();
        return view('reportes.principal', compact('empresas','tipo_activos','reportes','cant_item','request2'));
    }
    public function collection_option($request){
        if($request->usuario_asig != null && $request->empresa == null && $request->activo != null ){
            $reportes = DB::table('detalle_asignacions')
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.Codigo',
                        'activos.Condicion',


                    'detalle_asignacions.IdE',
                    'detalle_asignacions.IdO',
                    'detalle_asignacions.IdD',
                    'detalle_asignacions.IdAct',
                    'tipo_activos.Nombre as activo',
                    'detalle_asignacions.UsuarioAsig',
                    'empresas.Nombre as empresa',
                    'oficinas.Direccion',
                    'departamentos.Nombre as departamento',
                    'detalle_asignacions.fecha_i',
                    'detalle_asignacions.fecha_f',
                    'detalle_asignacions.CapRecursos',

                    )

            ->where('detalle_asignacions.UsuarioAsig', '=' ,$request->usuario_asig)
            // ->where('detalle_asignacions.IdE', '=' ,$request->empresa)
            ->where('tipo_activos.id', '=' ,$request->activo)
            ->get();
            return $reportes;
        }

        if($request->usuario_asig ==null &&  $request->empresa !=null && $request->activo !=null){
            $reportes = DB::table('detalle_asignacions')
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.Codigo',
            'activos.Condicion',

                    'detalle_asignacions.IdE',
                    'detalle_asignacions.IdO',
                    'detalle_asignacions.IdD',
                    'detalle_asignacions.IdAct',
                    'tipo_activos.Nombre as activo',
                    'detalle_asignacions.UsuarioAsig',
                    'empresas.Nombre as empresa',
                    'oficinas.Direccion',
                    'departamentos.Nombre as departamento',
                    'detalle_asignacions.fecha_i',
                    'detalle_asignacions.fecha_f',
                    'detalle_asignacions.CapRecursos',
                    'detalle_asignacions.deleted_at'
                    )
            ->where('detalle_asignacions.deleted_at', '=', null)
            // ->where('detalle_asignacions.UsuarioAsig', '=' ,$request->usuario_asig)
            ->where('detalle_asignacions.IdE', '=' ,$request->empresa)
            ->where('tipo_activos.id', '=' ,$request->activo)
            ->get();
            return $reportes;
        }
        if($request->usuario_asig !=null &&  $request->empresa !=null && $request->activo ==null){
            $reportes = DB::table('detalle_asignacions')
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.Codigo',
            'activos.Condicion',

                    'detalle_asignacions.IdE',
                    'detalle_asignacions.IdO',
                    'detalle_asignacions.IdD',
                    'detalle_asignacions.IdAct',
                    'tipo_activos.Nombre as activo',
                    'detalle_asignacions.UsuarioAsig',
                    'empresas.Nombre as empresa',
                    'oficinas.Direccion',
                    'departamentos.Nombre as departamento',
                    'detalle_asignacions.fecha_i',
                    'detalle_asignacions.fecha_f',
                    'detalle_asignacions.CapRecursos',
                    'detalle_asignacions.deleted_at'
                    )
            ->where('detalle_asignacions.deleted_at', '=', null)
            ->where('detalle_asignacions.UsuarioAsig', '=' ,$request->usuario_asig)
            ->where('detalle_asignacions.IdE', '=' ,$request->empresa)
            // ->where('tipo_activos.id', '=' ,$request->activo)
            ->get();
            return $reportes;
        }
        if($request->usuario_asig !=null &&  $request->empresa ==null && $request->activo ==null){
            $reportes = DB::table('detalle_asignacions')
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.Codigo',
            'activos.Condicion',

                    'detalle_asignacions.IdE',
                    'detalle_asignacions.IdO',
                    'detalle_asignacions.IdD',
                    'detalle_asignacions.IdAct',
                    'tipo_activos.Nombre as activo',
                    'detalle_asignacions.UsuarioAsig',
                    'empresas.Nombre as empresa',
                    'oficinas.Direccion',
                    'departamentos.Nombre as departamento',
                    'detalle_asignacions.fecha_i',
                    'detalle_asignacions.fecha_f',
                    'detalle_asignacions.CapRecursos',
                    'detalle_asignacions.deleted_at'
                    )
            ->where('detalle_asignacions.deleted_at', '=', null)
            ->where('detalle_asignacions.UsuarioAsig', '=' ,$request->usuario_asig)
            // ->where('detalle_asignacions.IdE', '=' ,$request->empresa)
            // ->where('tipo_activos.id', '=' ,$request->activo)
            ->get();
            return $reportes;
        }
        if($request->usuario_asig ==null &&  $request->empresa !=null && $request->activo ==null){
            $reportes = DB::table('detalle_asignacions')
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.Codigo',
            'activos.Condicion',
                    'detalle_asignacions.IdE',
                    'detalle_asignacions.IdO',
                    'detalle_asignacions.IdD',
                    'detalle_asignacions.IdAct',
                    'tipo_activos.Nombre as activo',
                    'detalle_asignacions.UsuarioAsig',
                    'empresas.Nombre as empresa',
                    'oficinas.Direccion',
                    'departamentos.Nombre as departamento',
                    'detalle_asignacions.fecha_i',
                    'detalle_asignacions.fecha_f',
                    'detalle_asignacions.CapRecursos',
                    'detalle_asignacions.deleted_at'
                    )
            ->where('detalle_asignacions.deleted_at', '=', null)
            // ->where('detalle_asignacions.UsuarioAsig', '=' ,$request->usuario_asig)
            ->where('detalle_asignacions.IdE', '=' ,$request->empresa)
            // ->where('tipo_activos.id', '=' ,$request->activo)
            ->get();
            return $reportes;
        }
        if($request->usuario_asig == null && $request->empresa == null && $request->activo != null){
            $reportes = DB::table('detalle_asignacions')
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.Codigo',
            'activos.Condicion',
                    'detalle_asignacions.IdE',
                    'detalle_asignacions.IdO',
                    'detalle_asignacions.IdD',
                    'detalle_asignacions.IdAct',
                    'tipo_activos.Nombre as activo',
                    'detalle_asignacions.UsuarioAsig',
                    'empresas.Nombre as empresa',
                    'oficinas.Direccion',
                    'departamentos.Nombre as departamento',
                    'detalle_asignacions.fecha_i',
                    'detalle_asignacions.fecha_f',
                    'detalle_asignacions.CapRecursos',
                    'detalle_asignacions.deleted_at'
                    )
            ->where('detalle_asignacions.deleted_at', '=', null)
            // ->where('detalle_asignacions.UsuarioAsig', '=' ,$request->usuario_asig)
            // ->where('detalle_asignacions.IdE', '=' ,$request->empresa)
            ->where('tipo_activos.id', '=' ,$request->activo)
            ->get();
            return $reportes;
        }
        if($request->usuario_asig !=null &&  $request->empresa !=null && $request->activo !=null){
            $reportes = DB::table('detalle_asignacions')
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.Codigo',
            'activos.Condicion',
                    'detalle_asignacions.IdE',
                    'detalle_asignacions.IdO',
                    'detalle_asignacions.IdD',
                    'detalle_asignacions.IdAct',
                    'tipo_activos.Nombre as activo',
                    'detalle_asignacions.UsuarioAsig',
                    'empresas.Nombre as empresa',
                    'oficinas.Direccion',
                    'departamentos.Nombre as departamento',
                    'detalle_asignacions.fecha_i',
                    'detalle_asignacions.fecha_f',
                    'detalle_asignacions.CapRecursos',
                    'detalle_asignacions.deleted_at'
                    )
            ->where('detalle_asignacions.deleted_at', '=', null)
            ->where('detalle_asignacions.UsuarioAsig', '=' ,$request->usuario_asig)
            ->where('detalle_asignacions.IdE', '=' ,$request->empresa)
            ->where('tipo_activos.id', '=' ,$request->activo)
            ->get();
            return $reportes;
        }

    }

}
