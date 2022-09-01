<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipoActivoRequest;
use App\TipoActivo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class TipoActivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tipo_activos = TipoActivo::orderBy('id' ,'DESC')->paginate(50);
        $tipo_activos = DB::table('tipo_activos')
            ->where('deleted_at', '=', null)
            ->orderBy('id' ,'DESC')
            ->paginate(30);
        return view('TipoActivos.index' , compact('tipo_activos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TipoActivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoActivoRequest $request)
    {
        $tipo_activo = TipoActivo::create($request->all());
            return redirect()->route('tipo_activos.index')
            ->with('info',' Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoActivo $tipo_activo)
    {
        return view('TipoActivos.show', compact('tipo_activo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoActivo $tipo_activo)
    {
        return view('TipoActivos.edit', compact('tipo_activo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TipoActivo $tipo_activo)
    {
        //validando los campos del formulario
        Validator::make($request->all(), [
            'Nombre' => 'required',
         ])->validate();
         $tipo_activo->update($request->all());
         return redirect()->route('tipo_activos.index')
             ->with('info','Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_activo =TipoActivo::find($id);
        $tipo_activo->delete();
        return back()->with('info', 'eliminado correctamente');
    }
}
