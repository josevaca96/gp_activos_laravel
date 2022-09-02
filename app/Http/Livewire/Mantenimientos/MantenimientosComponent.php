<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Activo;
use App\Mantenimiento;

class MantenimientosComponent extends Component
{
    // variables
    public $search='';
    public $nombre_activo;
    // variables para obj objetos
    public  $obj_mantenimiento;
    public  $obj_activo;
    protected $rules = [
        'obj_activo.NroSerial' => 'nullable',
        'obj_activo.Codigo' => 'required',

        'obj_mantenimiento.IdActivo' => 'required|integer',
        'obj_mantenimiento.FechaMant' => 'required|date',
        'obj_mantenimiento.FechaMantProxi' => 'date|nullable',
        'obj_mantenimiento.Descripcion' => 'string|nullable',
        'obj_mantenimiento.Test' => 'required|boolean'
    ];
    protected $customMessages = [
        'obj_activo.NroSerial.*' => 'Cuidado!! revise el los Datos de **Nro. Serial**',
        'obj_activo.Codigo.*' => 'Cuidado!! revise el los Datos de **Código**',
        'obj_mantenimiento.IdActivo.*' => 'Cuidado!! revise el los Datos de **Activo**',

        'obj_mantenimiento.FechaMant.*' => 'Cuidado!! revise el los Datos de **Fecha de Mantenimiento**',
        'obj_mantenimiento.FechaMantProxi.*' => 'Cuidado!! revise los Datos de **Fecha de Proximo Mantenimiento**',
        'obj_mantenimiento.Test.*' => 'Cuidado!! revise los Datos de **Aprobación de Mantenimiento**',

    ];

    public function render(){
        return view('livewire.mantenimientos.mantenimientos-component',[
            'activos' =>$this->traer_activos()
        ]);
    }
    public function Cap_act($id,$codigo,$activo,$serial,$modelo){
        // $this->obj_activo->id=$id;
        $this->obj_activo->Codigo=$codigo;
        $this->nombre_activo=$activo;
        $this->obj_mantenimiento->IdActivo=$id;
        $this->obj_activo->NroSerial=$serial;
        // dd($this->obj_activo);
    }
    public function guardar(){
        // dd($this->obj_mantenimiento);
        $this->validate($this->rules, $this->customMessages);
        Mantenimiento::create([
            'IdActivo'    => $this->obj_mantenimiento->IdActivo,
            'FechaMant'   => $this->obj_mantenimiento->FechaMant,
            'FechaMantProxi'   => $this->obj_mantenimiento->FechaMantProxi,
            'Descripcion'   => $this->obj_mantenimiento->Descripcion,
            'Test'   => $this->obj_mantenimiento->Test,
        ]);
        return redirect()->route('mantenimientos.index')
        ->with('info',' Mantenimiento Creado con éxito');
        try {
            //

        }catch(\Exception $e){
            Log::debug($e ->getMessage());
            return redirect('/error');
          }
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
        $this->obj_activo=new Activo();
        $this->obj_mantenimiento=new Mantenimiento();
    }
    public function change_fechP(){
        //formateamos la data
        $date =Carbon::parse($this->obj_mantenimiento->FechaMant);
        //calculamos los meses y convertimos de datetime a time
        $this->obj_mantenimiento->FechaMantProxi= $date->addMonths(6)->toDateString();

    }

}
