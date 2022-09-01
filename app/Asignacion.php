<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table = 'detalle_asignacions';
    protected $fillable = [
        'IdE',
        'IdO',
        'IdD',
        'IdAct',
        'fecha_i',
        'fecha_f',
        'UsuarioAsig',
        'CapRecursos',
    ];
    public $timestamps =false;

}
