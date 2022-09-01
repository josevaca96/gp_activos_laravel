<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Asignacion;
use App\Activo;
use\App\TipoActivo;
use\App\Empresa;
use\App\Oficina;
use\App\Departamento;
use Illuminate\Support\Facades\DB;

class DetalleAsignacionEdit extends Component
{
    public $search = '';
    public $obj_asig;

    
    public $id_act = '';
    public $codigo = '';
    // public $activo = '';
    public $serial = '';
    // public $modelo = '';
    public $obj_asignacion = '';
    //copiado
    public  $var_IdE;
    public$var_IdO;
    public $var_IdD;
    public $var_IdAct;
    public $fecha_i;
    public $fecha_f;
    public $UsuarioAsig;
    public $CapRecursos;
    public $Codigo;
    public $NroSerial;
    // 
    public $obj_activos;

    //claves de comprovación
    public $v_ant_ide;
    public $v_ant_ido;
    public $v_ant_idd;
    public $v_ant_idact;

    public function render(){
        return view('livewire.detalle-asignacion-edit', 
        [
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
        $this->var_IdAct=$id_act;
        $this->Codigo=$codigo;
        $this->activo=$activo;
        $this->NroSerial=$serial;
        // $this->modelo=$modelo;  
    }
    public function mount(Asignacion $transform){
        // dd($transform->id);
        // cargar los datos del activo
        $this->id_activo_get($transform->IdAct);
        $this->var_IdE = $transform->IdE;
        $this->var_IdD = $transform->IdD;
        $this->var_IdO = $transform->IdO;
        $this->CapRecursos = $transform->CapRecursos;
        $this->fecha_i = $transform->fecha_i;
        $this->fecha_f = $transform->fecha_f;
        $this->UsuarioAsig = $transform->UsuarioAsig;

        // llenar los datos de las claves anterior del objeto
        $this->v_ant_ide = $transform->IdE;
        $this->v_ant_ido = $transform->IdO;
        $this->v_ant_idd = $transform->IdD;
        $this->v_ant_idact = $transform->IdAct;
    }
    public function id_activo_get($id){
        $act =DB::table('activos')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.*',
                    'tipo_activos.Nombre as activo'
                    )
            ->where('activos.id',"=", $id)
            ->get();
            $this->var_IdAct =  $act[0]->id;
            $this->Codigo =  $act[0]->Codigo;
            $this->NroSerial =  $act[0]->NroSerial;
    }

}
