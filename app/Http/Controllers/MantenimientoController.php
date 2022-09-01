<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mantenimiento;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mantenimientos = DB::table('mantenimientos')
        ->select('mantenimientos.*','activos.Codigo','tipo_activos.Nombre')
        ->join('activos', 'mantenimientos.IdActivo', '=', 'activos.id')
        ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        ->get();
        return view('Mantenimientos.index',compact('mantenimientos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('Mantenimientos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function limitar_cadena($cadena, $limite, $sufijo){
        // Si la longitud es mayor que el límite...
        if(strlen($cadena) > $limite){
            // Entonces corta la cadena y ponle el sufijo
            return substr($cadena, 0, $limite) . $sufijo;
        }

        // Si no, entonces devuelve la cadena normal
        return $cadena;
    }
    public function show(Mantenimiento $mantenimiento){
        $obj_mantenimiento = DB::table('mantenimientos')
        ->select('mantenimientos.*',
                'tipo_activos.Nombre',
                'activos.Codigo')
        ->join('activos', 'mantenimientos.IdActivo', '=', 'activos.id')
        ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        ->where('mantenimientos.id', '=', $mantenimiento->id)
        ->get();

        return view('Mantenimientos.show', compact('obj_mantenimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
