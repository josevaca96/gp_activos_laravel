<?php

namespace App;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // const User_Disponible = 'disponible';
    // const User_no_Disponible = 'no disponible';

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 
        'email',
        'password',
        // 'estado',
    ];

    // public function estaDisponible(){
    //     return $this->estado == User::User_Disponible;
    // }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empleados()
    {
        return $this->hasMany('App\Empleado', 'idUser', 'id');
    }
}
 