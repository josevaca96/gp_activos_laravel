<?php

namespace App\Http\Controllers;
use App\Asignacion;
use App\Empresa;
use App\TipoActivo;
use App\Oficina;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function PDF(Request $request){
        // dd($request);
        $usuario=$request->usuario_asig;
        $empresa=$request->empresa;
        $activo=$request->activo;
        $oficina=$request->oficina;

        // dd($usuario,$empresa,$activo);
        $data = $this->collection_option($usuario, $empresa , $activo,$oficina);
        $conve= @json_decode(json_encode($data), true); //$data->toArray();
        // dd($data);
        $oficinas = Oficina::all();

        return PDF::loadView('PDF.asignaciones-pdf',compact('data'))
        ->setPaper('a4', 'landscape')
        ->stream('PDF.asignaciones.pdf');
    }
    public function collection_option($usuario, $empresa , $activo, $oficina){

        $reportes = DB::table('detalle_asignacions')
            ->select('activos.Codigo',
                'activos.Modelo',
                'activos.Marca',
                'activos.NroSerial',
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
                // 'detalle_asignacions.deleted_at'
            )
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id');

        if ($usuario != "") {
            $reportes = $reportes->where('detalle_asignacions.UsuarioAsig', '=' ,$usuario);
        }

        if ($empresa != "") {
            $reportes = $reportes->where('detalle_asignacions.IdE', '=' ,$empresa);
        }

        if ($activo != "") {
            $reportes = $reportes->where('tipo_activos.id', '=' ,$activo);
        }
        if ($oficina != "") {
            $reportes = $reportes->where('detalle_asignacions.IdO', '=' ,$oficina);
        }
        $reportes = $reportes->orderBy('detalle_asignacions.fecha_i', 'desc')->get();

        return $reportes;
        // if($usuario != null && $empresa == null && $activo != null ){
        //     $reportes = DB::table('detalle_asignacions')
        //     ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
        //     ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
        //     ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
        //     ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
        //     ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        //     ->select('activos.Codigo',
        //             'activos.Modelo',
        //             'activos.Marca',
        //             'activos.NroSerial',
        //             'activos.Condicion',

        //             'detalle_asignacions.IdE',
        //             'detalle_asignacions.IdO',
        //             'detalle_asignacions.IdD',
        //             'detalle_asignacions.IdAct',
        //             'tipo_activos.Nombre as activo',
        //             'detalle_asignacions.UsuarioAsig',
        //             'empresas.Nombre as empresa',
        //             'oficinas.Direccion',
        //             'departamentos.Nombre as departamento',
        //             'detalle_asignacions.fecha_i',
        //             'detalle_asignacions.fecha_f',
        //             'detalle_asignacions.CapRecursos',
        //             )
        //     ->where('detalle_asignacions.UsuarioAsig', '=' ,$usuario)
        //     ->where('tipo_activos.id', '=' ,$activo)
        //     ->get();
        //     return $reportes;
        // }
        // if($usuario == null && $empresa == null && $activo != null){
        //     $reportes = DB::table('detalle_asignacions')
        //     ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
        //     ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
        //     ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
        //     ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
        //     ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        //     ->select('activos.Codigo',
        //     'activos.Modelo',
        //     'activos.Marca',
        //     'activos.NroSerial',
        //     'activos.Condicion',

        //             'detalle_asignacions.IdE',
        //             'detalle_asignacions.IdO',
        //             'detalle_asignacions.IdD',
        //             'detalle_asignacions.IdAct',
        //             'tipo_activos.Nombre as activo',
        //             'detalle_asignacions.UsuarioAsig',
        //             'empresas.Nombre as empresa',
        //             'oficinas.Direccion',
        //             'departamentos.Nombre as departamento',
        //             'detalle_asignacions.fecha_i',
        //             'detalle_asignacions.fecha_f',
        //             'detalle_asignacions.CapRecursos',
        //             )
        //     ->where('tipo_activos.id', '=' ,$activo)
        //     ->get();
        //     return $reportes;
        // }
        // if($usuario ==null &&  $empresa !=null && $activo !=null){
        //     $reportes = DB::table('detalle_asignacions')
        //     ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
        //     ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
        //     ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
        //     ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
        //     ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        //     ->select('activos.Codigo',
        //     'activos.Modelo',
        //     'activos.Marca',
        //     'activos.NroSerial',
        //     'activos.Condicion',
        //             'detalle_asignacions.IdE',
        //             'detalle_asignacions.IdO',
        //             'detalle_asignacions.IdD',
        //             'detalle_asignacions.IdAct',
        //             'tipo_activos.Nombre as activo',
        //             'detalle_asignacions.UsuarioAsig',
        //             'empresas.Nombre as empresa',
        //             'oficinas.Direccion',
        //             'departamentos.Nombre as departamento',
        //             'detalle_asignacions.fecha_i',
        //             'detalle_asignacions.fecha_f',
        //             'detalle_asignacions.CapRecursos',

        //             )
        //     ->where('detalle_asignacions.IdE', '=' ,$empresa)
        //     ->where('tipo_activos.id', '=' ,$activo)
        //     ->get();
        //     return $reportes;
        // }
        // if($usuario !=null &&  $empresa !=null && $activo ==null){
        //     $reportes = DB::table('detalle_asignacions')
        //     ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
        //     ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
        //     ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
        //     ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
        //     ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        //     ->select('activos.Codigo',
        //     'activos.Modelo',
        //     'activos.Marca',
        //     'activos.NroSerial',
        //     'activos.Condicion',
        //             'detalle_asignacions.IdE',
        //             'detalle_asignacions.IdO',
        //             'detalle_asignacions.IdD',
        //             'detalle_asignacions.IdAct',
        //             'tipo_activos.Nombre as activo',
        //             'detalle_asignacions.UsuarioAsig',
        //             'empresas.Nombre as empresa',
        //             'oficinas.Direccion',
        //             'departamentos.Nombre as departamento',
        //             'detalle_asignacions.fecha_i',
        //             'detalle_asignacions.fecha_f',
        //             'detalle_asignacions.CapRecursos',

        //             )
        //     ->where('detalle_asignacions.UsuarioAsig', '=' ,$usuario)
        //     ->where('detalle_asignacions.IdE', '=' ,$empresa)

        //     ->get();
        //     return $reportes;
        // }
        // if($usuario !=null &&  $empresa ==null && $activo ==null){
        //     $reportes = DB::table('detalle_asignacions')
        //     ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
        //     ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
        //     ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
        //     ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
        //     ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        //     ->select('activos.Codigo',
        //     'activos.Modelo',
        //     'activos.Marca',
        //     'activos.NroSerial',
        //     'activos.Condicion',
        //             'detalle_asignacions.IdE',
        //             'detalle_asignacions.IdO',
        //             'detalle_asignacions.IdD',
        //             'detalle_asignacions.IdAct',
        //             'tipo_activos.Nombre as activo',
        //             'detalle_asignacions.UsuarioAsig',
        //             'empresas.Nombre as empresa',
        //             'oficinas.Direccion',
        //             'departamentos.Nombre as departamento',
        //             'detalle_asignacions.fecha_i',
        //             'detalle_asignacions.fecha_f',
        //             'detalle_asignacions.CapRecursos',
        //             )
        //     ->where('detalle_asignacions.UsuarioAsig', '=' ,$usuario)
        //     ->get();
        //     return $reportes;
        // }
        // if($usuario !=null &&  $empresa !=null && $activo !=null){
        //     $reportes = DB::table('detalle_asignacions')
        //     ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
        //     ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
        //     ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
        //     ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
        //     ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        //     ->select('activos.Codigo',
        //     'activos.Modelo',
        //     'activos.Marca',
        //     'activos.NroSerial',
        //     'activos.Condicion',
        //             'detalle_asignacions.IdE',
        //             'detalle_asignacions.IdO',
        //             'detalle_asignacions.IdD',
        //             'detalle_asignacions.IdAct',
        //             'tipo_activos.Nombre as activo',
        //             'detalle_asignacions.UsuarioAsig',
        //             'empresas.Nombre as empresa',
        //             'oficinas.Direccion',
        //             'departamentos.Nombre as departamento',
        //             'detalle_asignacions.fecha_i',
        //             'detalle_asignacions.fecha_f',
        //             'detalle_asignacions.CapRecursos',
        //             )
        //     ->where('detalle_asignacions.UsuarioAsig', '=' ,$usuario)
        //     ->where('detalle_asignacions.IdE', '=' ,$empresa)
        //     ->where('tipo_activos.id', '=' ,$activo)
        //     ->get();
        //     return $reportes;
        // }
        // if($usuario ==null &&  $empresa !=null && $activo ==null){
        //     $reportes = DB::table('detalle_asignacions')
        //     ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
        //     ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
        //     ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
        //     ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
        //     ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        //     ->select('activos.Codigo',
        //     'activos.Modelo',
        //     'activos.Marca',
        //     'activos.NroSerial',
        //     'activos.Condicion',
        //             'detalle_asignacions.IdE',
        //             'detalle_asignacions.IdO',
        //             'detalle_asignacions.IdD',
        //             'detalle_asignacions.IdAct',
        //             'tipo_activos.Nombre as activo',
        //             'detalle_asignacions.UsuarioAsig',
        //             'empresas.Nombre as empresa',
        //             'oficinas.Direccion',
        //             'departamentos.Nombre as departamento',
        //             'detalle_asignacions.fecha_i',
        //             'detalle_asignacions.fecha_f',
        //             'detalle_asignacions.CapRecursos',

        //             )
        //     ->where('detalle_asignacions.IdE', '=' ,$empresa)
        //     ->get();
        //     return $reportes;
        // }
        // if($usuario ==null &&  $empresa ==null && $activo ==null){
        //     $reportes = DB::table('detalle_asignacions')
        //     ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
        //     ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
        //     ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
        //     ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
        //     ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        //     ->select('activos.Codigo',
        //     'activos.Modelo',
        //     'activos.Marca',
        //     'activos.NroSerial',
        //     'activos.Condicion',
        //             'detalle_asignacions.IdE',
        //             'detalle_asignacions.IdO',
        //             'detalle_asignacions.IdD',
        //             'detalle_asignacions.IdAct',
        //             'tipo_activos.Nombre as activo',
        //             'detalle_asignacions.UsuarioAsig',
        //             'empresas.Nombre as empresa',
        //             'oficinas.Direccion',
        //             'departamentos.Nombre as departamento',
        //             'detalle_asignacions.fecha_i',
        //             'detalle_asignacions.fecha_f',
        //             'detalle_asignacions.CapRecursos',

        //             )
        //     ->get();
        //     return $reportes;
        // }
    }

}
