<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\OficinaRequest;
use App\Oficina;
use Illuminate\Support\Facades\Validator;
class OficinasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $oficinas = DB::table('oficinas')
            ->where('deleted_at', '=', null)
            ->orderBy('id' ,'DESC')
            ->paginate(30);
            return view('oficinas.index' , compact('oficinas'));
        }catch(\Exception $e){
          Log::debug($e ->getMessage());
          return redirect('/error');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oficinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OficinaRequest $request)
    {
        $oficina = Oficina::create($request->all());
            return redirect()->route('oficinas.index')
            ->with('info',' Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Oficina $oficina)
    {
        return view('oficinas.show', compact('oficina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Oficina $oficina)
    {
        return view('oficinas.edit', compact('oficina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oficina $oficina)
    {
        //validando los campos del formulario
        Validator::make($request->all(), [
            'Direccion' => 'required',
            ],
        [
            'Direccion.required' => 'El Campo Dirección es requerido',
        ])->validate();
         $oficina->update($request->all());
         return redirect()->route('oficinas.index')
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
        $oficina =Oficina::find($id);
        $oficina->delete();
        return back()->with('info', 'eliminado correctamente');
    }
}
