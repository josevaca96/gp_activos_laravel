<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Support\Facades\DB;
use App\Empresa;
use Illuminate\Support\Facades\Validator;
class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = DB::table('empresas')
            ->where('deleted_at', '=', null)
            ->orderBy('id' ,'DESC')
            ->paginate(30);
        return view('empresas.index' , compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = Empresa::create($request->all());
            return redirect()->route('empresas.index')
            ->with('info',' Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('Empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('Empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Empresa $empresa)
    {
        // dd($request);
        //validando los campos del formulario
        Validator::make($request->all(), [
            'Nombre' => 'required',
            ],
        [
            'Nombre.required' => 'El Campo Nombre es requerido',
        ])->validate();
         $empresa->update($request->all());
         return redirect()->route('empresas.index')
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
        $empresa =Empresa::find($id);
        $empresa->delete();
        return back()->with('info', 'eliminado correctamente');
    }
}
