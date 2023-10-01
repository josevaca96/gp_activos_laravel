<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Asignacion;
use App\Oficina;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;


class DetalleAsignacion extends Controller
{

    public function index(){
        $query= Asignacion::join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.Codigo',

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
            );
            // ->where('detalle_asignacions.deleted_at', '=', null)
            // ->orderBy('IdAct' ,'DESC')
            // ->paginate(30);
            // ->get();
            // dd($detalle_asginacions->get());
            $detalle_asginacions = $query->get();
            $detalle_asginacions_paginate =   $query->orderBy('IdAct' ,'DESC')->paginate(30);

        return view('DetalleAsignacion.index' , compact('detalle_asginacions', 'detalle_asginacions_paginate'));
    }

    public function create(){
        return view('DetalleAsignacion.create');
    }

    public $G_IdE_S,$G_IdO_S,$G_IdD_S,$G_IdAct_S;
    public function store(Request $request){
        // dd($request->IdE);
        $this->G_IdE_S =$request->IdE;
        $this->G_IdO_S =$request->IdO;
        $this->G_IdD_S =$request->IdD;
        $this->G_IdAct_S =$request->IdAct;
        //validando los campos del formulario
        Validator::make($request->all(), [
            'IdE'   => 'required',
            'IdO'   => 'required',
            'IdD'   => 'required',
            'IdAct' => 'required',
            'fecha_i' => 'required',
            'CapRecursos' => 'required',
            'IdE'   => Rule::unique('detalle_asignacions')->where(function ($query){
                return $query->where('IdE',$this->G_IdE_S)
                             ->where('IdO',$this->G_IdO_S)
                             ->where('IdD',$this->G_IdD_S)
                             ->where('IdAct',$this->G_IdAct_S);
            })
        ],
        [
            'IdE.required' => 'El Campo Empresa es requerido',
            'IdE.unique' => 'Verifique los Datos',
            'IdO.required' => 'El Campo Oficina es requerido',
            'IdD.required' => 'El Campo Departamento es requerido',
            'IdAct.required' => 'El Campo Activo es requerido',
            'fecha_i.required' => 'El Campo Fecha Inicial es requerido',
            'CapRecursos.required' => 'El Campo Captura de Recurso es requerido',
        ])->validate();
        $asigancion = Asignacion::create($request->all());
        return redirect()->route('asignaciones.index')
        ->with('info',' Creado con éxito');
    }

    public function show($IdE,$IdO,$IdD,$IdAct){
        $detalle= DB::table('detalle_asignacions')
                ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
                ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
                ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
                ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
                ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
                ->select('activos.Codigo',
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
                'detalle_asignacions.CapRecursos'
                )
                ->where('IdE', '=', $IdE)
                ->where('IdO','=', $IdO)
                ->where('IdD','=', $IdD)
                ->where('IdAct','=',$IdAct)
                ->get();
                // dd($detalle);
        return view('DetalleAsignacion.show', compact('detalle'));
    }

    public function edit($IdE,$IdO,$IdD,$IdAct){
        // dd($IdE,$IdO,$IdD,$IdAct);
        $detalle_asignacions =Asignacion::where('IdE','=',$IdE)
            ->where('IdO','=',$IdO)
            ->where('IdD','=',$IdD)
            ->where('IdAct','=',$IdAct)
            ->get();
            $transform=$detalle_asignacions[0];
            return view('DetalleAsignacion.edit', compact('detalle_asignacions','transform'));
    }
    public function asignaciones_edit(Request $request){
        $detalle_asignacions =Asignacion::where('IdE','=',$request->IdE)
            ->where('IdO','=',$request->IdO)
            ->where('IdD','=',$request->IdD)
            ->where('IdAct','=',$request->IdAct)
            ->get();
            $transform=$detalle_asignacions[0];
        return view('DetalleAsignacion.edit', compact('detalle_asignacions','transform'));
    }

    public function before_edit(Request $request){
        return response()->json([
            'url' => route('asignaciones.edit', [
                'IdE' => $request->IdE,
                'IdO' => $request->IdO,
                'IdD' => $request->IdD,
                'IdAct' => $request->IdAct,
             ])
        ]);
    }

    public $G_IdE_U,$G_IdO_U,$G_IdD_U,$G_IdAct_U;
    public function update(Request $request, Asignacion $obj_asig){
        //validando los campos del formulario
        $this->G_IdE_U =$request->IdE;
        $this->G_IdO_U =$request->IdO;
        $this->G_IdD_U =$request->IdD;
        $this->G_IdAct_U =$request->IdAct;

        Validator::make($request->all(), [
            'IdE' => 'required',
            'IdO' => 'required',
            'IdD' => 'required',
            'IdAct' => 'required',
            'fecha_i' => 'required',
            // 'IdE'   => Rule::unique('detalle_asignacions')->ignore($obj_consulta)->where(function ($query){
            //     return $query->where('IdE',$this->G_IdE_U)
            //                  ->where('IdO',$this->G_IdO_U)
            //                  ->where('IdD',$this->G_IdD_U)
            //                  ->where('IdAct',$this->G_IdAct_U);
            // })
            ],
            [
            'IdE.required' => 'El Campo Empresa es requerido',
            // 'IdE.unique' => 'Verifique los Datos',
            'IdO.required' => 'El Campo Oficina es requerido',
            'IdD.required' => 'El Campo Departamento es requerido',
            'IdAct.required' => 'El Campo Activo es requerido',
            'fecha_i.required' => 'El Campo Fecha inicial es requerido',
        ])->validate();
        $obj_asig = DB::table('detalle_asignacions')
            ->where('IdE', $request->ide2)
            ->where('IdO', $request->ido2)
            ->where('IdD', $request->idd2)
            ->where('IdAct', $request->idact2)

            ->update(['IdE' => $request->IdE,
                    'IdO' => $request->IdO,
                    'IdD' => $request->IdD,
                    'IdAct' => $request->IdAct,
                    'fecha_i' => $request->fecha_i,
                    'fecha_f' => $request->fecha_f,
                    'UsuarioAsig' => $request->UsuarioAsig,
                    'CapRecursos' => $request->CapRecursos]);

        return redirect()->route('asignaciones.index')
        ->with('info','Actualizado con éxito');
    }

    public function destroy($IdE,$IdO,$IdD,$IdAct){
        //deleted
        // $fecha = $this->obtener_fecha_actual();

        $asignacion =DB::table('detalle_asignacions')
        ->where('IdE' ,'=' ,$IdE)
        ->where('IdO' ,'=' ,$IdO)
        ->where('IdD' ,'=' ,$IdD)
        ->where('IdAct' ,'=' ,$IdAct)
        ->delete();
        return back()->with('info', 'eliminado correctamente');
    }

    public function obtener_fecha_actual(){
        $fecha_actual = new Carbon();
        date_default_timezone_set('America/La_Paz');
        $time = strtotime($fecha_actual);
        $fechaLocal = date("Y-m-d H:i:s", $time);
        return $fechaLocal;
    }

    public function search_client(Request $request){
        $term = $request->get('term');
        $querys = DB::table('empleados')
            ->select(DB::raw('CONCAT(Nombre, " ", Apellido) as NombreCompleto'))
            ->where(DB::raw('CONCAT(Nombre, " ", Apellido)'),'LIKE', '%'.$term . '%')->distinct()->get();
            $data = [];
        foreach($querys as $query){
            $data[] = [
                'label' => $query->NombreCompleto
            ];
        }
        return $data;
    }

}
