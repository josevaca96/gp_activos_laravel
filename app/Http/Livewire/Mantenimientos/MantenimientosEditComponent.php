<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Activo;
use App\Mantenimiento;

class MantenimientosEditComponent extends Component
{
    public function render(){
        return view('livewire.mantenimientos.mantenimientos-edit-component',[
            'activos' =>$this->traer_activos()

        ]);
    }
    //variables para objeto
    public $mantenimiento;
    public $var_codigo,$var_nombre_activo,$var_serial,$var_id_activo;

    public  $obj_activo;
    public $search;
    //creando validación
    protected $rules = [
        'var_serial' => 'nullable',
        'var_codigo' => 'required',
        'var_id_activo' => 'required|integer',
        'mantenimiento.FechaMant' => 'required|date',
        'mantenimiento.FechaMantProxi' => 'date|nullable',
        'mantenimiento.Descripcion' => 'string|nullable',
        'mantenimiento.Test' => 'required|boolean'
    ];
    //mensajes para las validaciones
    protected $customMessages = [
        'var_serial.*' => 'Cuidado!! revise el los Datos de **Nro. Serial**',
        'var_codigo.*' => 'Cuidado!! revise el los Datos de **Código**',
        'var_id_activo.*' => 'Cuidado!! revise el los Datos de **Activo**',
        'mantenimiento.FechaMant.*' => 'Cuidado!! revise el los Datos de **Fecha de Mantenimiento**',
        'mantenimiento.FechaMantProxi.*' => 'Cuidado!! revise los Datos de **Fecha de Proximo Mantenimiento**',
        'mantenimiento.Test.*' => 'Cuidado!! revise los Datos de **Aprobación de Mantenimiento**',
    ];
    public function update(){
        // dd($this->mantenimiento->FechaMant);
        $this->validate($this->rules, $this->customMessages);
        Mantenimiento::where('id', $this->mantenimiento->id)
          ->update(['IdActivo' => $this->var_id_activo,
                    'FechaMant' => $this->mantenimiento->FechaMant,
                    'FechaMantProxi' => $this->mantenimiento->FechaMantProxi,
                    'Descripcion' => $this->mantenimiento->Descripcion,
                    'Test' => $this->mantenimiento->Test
        ]);
        return redirect()->route('mantenimientos.index')
             ->with('info','Actualizado con éxito');

    }
    public function change_fechP(){
        //formateamos la data
        $date =Carbon::parse($this->mantenimiento->FechaMant);
        //calculamos los meses y convertimos de datetime a time
        $this->mantenimiento->FechaMantProxi= $date->addMonths(6)->toDateString();
    }
    public function Cap_act($id,$codigo,$activo,$serial){
        $this->var_codigo=$codigo;
        $this->var_id_activo=$id;
        $this->var_serial=$serial;
        //este es un campo personalizado
        $this->var_nombre_activo=$activo;
    }
    public function traer_activos(){
        if($this->search != ''){
            $activos =DB::table('activos')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.*',
                    'tipo_activos.Nombre as activo'
                    )
            ->where('tipo_activos.Nombre', 'like', '%' . $this->search . '%')
            ->orwhere('activos.Marca', 'like', '%' . $this->search . '%')
            ->orwhere('activos.Modelo', 'like', '%' . $this->search . '%')
            ->orwhere('activos.Codigo', 'like', '%' . $this->search . '%')
            ->orderBy('id' ,'ASC')->paginate(5);
            return $activos;
        }
    }
    public function mount(){
        $this->mostrar_activo();
    }
    public function mostrar_activo(){
        $activo=DB::table('activos')
        ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
        ->select('activos.*',
                'tipo_activos.Nombre as activo'
                )
        ->where('activos.id', $this->mantenimiento->IdActivo)
        ->get();
        $this->var_id_activo=$this->mantenimiento->IdActivo;
        $this->var_codigo=$activo[0]->Codigo;
        $this->var_nombre_activo=$activo[0]->activo;
        $this->var_serial=$activo[0]->NroSerial;
    }

}
