<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Activo;
use\App\TipoActivo;
use\App\Empresa;
use\App\Oficina;
use\App\Departamento;
use Illuminate\Support\Facades\DB;

class DetalleAsignacion extends Component
{
    
    public $search = '';
    public $id_act = '';
    public $codigo = '';
    public $activo = '';
    public $serial = '';
    public $modelo = '';
    public $obj_asignacion = '';
    
    public $IdE;
    public $IdO;
    public $IdD;
    public $IdAct;
    public function render(){
        return view('livewire.detalle-asignacion', 
        [
            //
                // 'activos' =>DB::table('detalle_asignacions')
                // ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
                // ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
                // ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
                // ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
                // ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
                // ->select('activos.Codigo',
                //         'tipo_activos.Nombre as activo',
                //         'detalle_asignacions.UsuarioAsig',
                //         'empresas.Nombre as empresa',
                //         'oficinas.Direccion',
                //         'departamentos.Nombre as departamento',
                //         'detalle_asignacions.fecha_i as fechaAsignacion',
                //         'detalle_asignacions.CapRecursos',
                //         )
                // ->where('tipo_activos.Nombre', 'like', '%' . $this->search . '%')
                // ->get(),
            'activos_all' =>$this->traer_activos(),
            'oficinas'  =>Oficina::all()->pluck('Direccion','id'),
            'empresas'  =>Empresa::all()->pluck('Nombre','id'),
            'departamentos'  =>Departamento::all()->pluck('Nombre','id')
        ]);
    }
    public function traer_activos(){         
        if($this->search != ''){
            $activos_modal =DB::table('activos')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.*',
                    'tipo_activos.Nombre as activo'
                    )
            ->where('tipo_activos.Nombre', 'like', '%' . $this->search . '%')
            ->orwhere('activos.Marca', 'like', '%' . $this->search . '%')
            ->orwhere('activos.Modelo', 'like', '%' . $this->search . '%')
            ->orwhere('activos.Codigo', 'like', '%' . $this->search . '%')
            ->orderBy('id' ,'ASC')->paginate(5);
        return $activos_modal;
        }
        
    }
    public function Cap_act($id_act,$codigo,$activo,$serial,$modelo){
        $this->id_act=$id_act;
        $this->codigo=$codigo;
        $this->activo=$activo;
        $this->serial=$serial;
        $this->modelo=$modelo;  
    }
}