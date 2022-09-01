<?php

namespace App\Http\Controllers;
use App\User;
use Caffeinated\Shinobi\Models\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id' ,'ASC')->paginate(3);
        return view('users.index' , compact('users'));
    }
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        /* Paso 1: Realizar la Actualizacion del usuario*/
        /* Paso 2: Realizar la Actualizacion de los Roles Seleccionado en los CheckBox*/

        //actualizar usuario
        $user->update($request->all());
        //actualizar roles
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit',$user->id)
            ->with('info','Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('info', 'eliminado correctamente');
    }
}
