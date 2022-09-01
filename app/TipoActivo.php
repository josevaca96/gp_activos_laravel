<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TipoActivo extends Model
{
    use SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'Nombre', 'Descripcion',
    ];
    public $timestamps =false;
}
