<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use\App\TipoActivo;

class Activo extends Model
{
    use SoftDeletes; 
    protected $dates = ['deleted_at'];
    
    public function tipo_activo()
    {
      return $this->belongsTo(TipoActivo::class, 'IdTAct');
    }
    protected $fillable = [
        'Codigo', 
        'IdTAct',
        'Marca',
        'Modelo',
        'NroSerial',
        'Condicion',
        'Observaciones',
    ];
    public $timestamps =false;
        

    public function obtener_codigo(){
        $ultimo = Activo::select('Codigo')->orderBy('id','desc')->take(1)->get();
         if($ultimo->isEmpty()){
            return 'IT-ACT00001';
         }  
        foreach($ultimo as $date){
               $str=  $date->Codigo;
               return $this->formatear_str($str);    
            }
    }
    private function formatear_str($str)
    {
        $numeros=substr($str, 6);
        for($i=1; $i<=strlen($numeros); $i++){
            if(substr($numeros,$i,1)!=0)
            {            
                $contenedor=substr($numeros,$i);
                $i=strlen($numeros);
            }
        }
        $resultado=$this->llenarDigito(($contenedor)+1,$numeros);
        return $resultado;
    }
    private function llenarDigito($contenedor,$numeros){
        $cant_ceros=strlen($numeros)-strlen($contenedor);
        $end=$contenedor;
        for($j=1;$j<=$cant_ceros; $j++){
            $end='0'.$end;
        }
        return ('IT-ACT'.$end);
    }
    
}