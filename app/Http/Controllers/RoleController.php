<?php

namespace App\Http\Controllers;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class RoleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id' ,'ASC')->paginate(3);
        return view('roles.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());

        //actualizar permisos
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index',$role->id)
            ->with('info','guardado con éxito');
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        
        /* Paso 1: Realizar la Actualizacion del usuario*/
        /* Paso 2: Realizar la Actualizacion de los Roles Seleccionado en los CheckBox*/
        
        //validar datos del formulario
        Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
        ])->validate();
        //actualizar role
        $role->update($request->all());

        //actualizar permisos
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.index',$role->id)
            ->with('info','Role actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('info', 'eliminado correctamente');
    }
}
