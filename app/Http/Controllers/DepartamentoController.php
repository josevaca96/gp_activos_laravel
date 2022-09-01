<?php

namespace App\Http\Controllers;
use App\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\DepartamentoRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = DB::table('departamentos')
            ->where('deleted_at', '=', null)
            ->orderBy('id' ,'ASC')
            ->paginate(30);
            
        return view('departamentos.index' , compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoRequest $request)
    {
        $departamento = Departamento::create($request->all());
            return redirect()->route('departamentos.index')
            ->with('info',' Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        return view('Departamentos.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        return view('Departamentos.edit', compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Departamento $departamento)
    {
        //validando los campos del formulario
        Validator::make($request->all(), [
            'Nombre' => 'required',
            ],
        [
            'Nombre.required' => 'El Campo Nombre es requerido',
        ])->validate();
         $departamento->update($request->all());
         return redirect()->route('departamentos.index')
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
        $departamento =Departamento::find($id);
        $departamento->delete();
        return back()->with('info', 'eliminado correctamente');
    }
}
