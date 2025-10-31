<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activo;
use App\TipoActivo;
use App\Asignacion;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ActivoRequest;
class ActivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = DB::table('activos')
        ->join('tipo_activos', 'tipo_activos.id', '=', 'activos.IdTAct')
        ->select('activos.*', 'tipo_activos.Nombre')
        ->where('activos.deleted_at', '=', null)
        ->orderBy('id' ,'DESC')
        // ->paginate(30);
        ->get();
        // $activos = Activo::orderBy('id' ,'DESC')->paginate(50);
        // dd($activos);
        return view('activos.index' , compact('activos'));
    }
    public function report_act(){
        $activos = Activo::orderBy('id' ,'DESC')->get();
        return view('activos.reporte' , compact('activos'));
    }
    public function report_filter(){
        $activos = Activo::orderBy('id' ,'DESC')->paginate(50);
        return view('activos.reporteall' , compact('activos'));
    }
    public function busqueda(){
        $activos =DB::table('activos')
        ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        ->select('activos.*',
                'tipo_activos.Nombre as activo'
                )
        ->orderBy('id', 'asc')
        ->get();
        return view('activos.busqueda' , compact('activos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('activos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validar_activo($activo){
        if(
            Validator::make($activo->toArray(), [
                'Codigo' => 'required|unique:activos',
                'Condicion' => 'required',
            ],
            [
                'Codigo.required' => 'El Campo Codigo es requerido',
                'Codigo.unique' => 'El Campo Codigo ya existe',
                'Condicion.required' => 'El Campo Condicion es requerido',
            ])->validate()
        )
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function store(Request $request){
        if($request->IdE=='' && $request->IdO=='' && $request->IdD=='' && $request->UsuarioAsig==''){
            if($this->validar_activo($request))
            {
            $activo = Activo::create($request->all());
            return redirect()->route('activos.index')
            ->with('info',' Activo Guardado con éxito');
            }
        }
        else{
            $activo = Activo::create($request->all());
            $llenado_detalle =new Asignacion;

            $llenado_detalle->IdAct=$activo->id;
            $llenado_detalle->IdO=$request->IdO;
            $llenado_detalle->IdE=$request->IdE;
            $llenado_detalle->IdD=$request->IdD;
            $llenado_detalle->fecha_i=$request->fecha_i;
            $llenado_detalle->fecha_f=$request->fecha_f;
            $llenado_detalle->UsuarioAsig=$request->UsuarioAsig;
            $llenado_detalle->CapRecursos=$request->CapRecursos;
            if(Validator::make($llenado_detalle->toArray(), [
                'IdO' => 'required',
                'IdE' => 'required',
                'IdD' => 'required',
                'IdAct' => 'required',
                'fecha_i' => 'required',

                ],
                [
                'IdO.required' => 'El Campo Oficina es requerido',
                'IdE.required' => 'El Campo Empresa es requerido',
                'IdD.required' => 'El Campo Departamento es requerido',
                'IdAct.required' => 'El Campo Activo es requerido',
                'fecha_i.required' => 'El Campo Fecha Inicial es requerido',
                ])->validate()
            )
            {
                $llenado_detalle->save();
                return redirect()->route('activos.index')
                ->with('info',' Activo Guardado con éxito');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activo $activo){

        return view('activos.show', compact('activo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activo $activo){
        $tipo_activos = TipoActivo::all()->pluck('Nombre','id');
        return view('activos.edit', compact('activo','tipo_activos'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Activo $activo){
          $activo->update($request->all());
         return redirect()->route('activos.index')
             ->with('info','Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $activo =Activo::find($id);
        $activo->delete();
        return back()->with('info', 'eliminado correctamente');
    }
}
