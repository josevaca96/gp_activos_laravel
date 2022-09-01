<?php

namespace App\Http\Livewire\Asignaciones;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use App\Asignacion;
use App\Oficina;
use App\Departamento;
use App\Empresa;

class AsignacionComponente extends Component
{
    use WithPagination;
    protected $listeners = ['refreshData' => 'edit'];
    public  $var_IdE,
            $var_IdO,
            $var_IdD,
            $var_IdAct,
            $fecha_i,
            $fecha_f,
            $UsuarioAsig,
            $CapRecursos,
            $Codigo,
            $NroSerial,
            //
            $obj_activos,
            $obj_asignacion;
            public $search='';
    public function render(){
        return view('livewire.asignaciones.asignacion-componente',[
                'asignaciones' => $this->traer_asignaciones(),
                'oficinas'  =>Oficina::all()->pluck('Direccion','id'),
                'empresas'  =>Empresa::all()->pluck('Nombre','id'),
                'departamentos'  =>Departamento::all()->pluck('Nombre','id'),
                'activos_all' =>$this->traer_activos()
            ]
        );
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
    public function Cap_act($id_Acct){
      return $this->id_activo=$id_Acct;
    }
    public function traer_asignaciones(){
        $obj_asignaciones = DB::table('detalle_asignacions')
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select('activos.Codigo',

                    'detalle_asignacions.IdE',
                    'detalle_asignacions.IdO',
                    'detalle_asignacions.IdD',
                    'detalle_asignacions.IdAct',
                    'tipo_activos.Nombre as activo',
                    'detalle_asignacions.UsuarioAsig',
                    'empresas.Nombre as empresa',
                    'oficinas.Direccion',
                    'departamentos.Nombre as departamento',
                    'detalle_asignacions.fecha_i',
                    'detalle_asignacions.fecha_f',
                    'detalle_asignacions.CapRecursos',
                    'detalle_asignacions.deleted_at'
                    )
            ->where('detalle_asignacions.deleted_at', '=', null)
            ->orderBy('IdE' ,'ASC')
            ->paginate(10);
        return $obj_asignaciones;
    }
    public function destroy($IdE,$IdO,$IdD,$IdAct){
        $fecha = $this->obtener_fecha_actual();
        $obj_asignacion = DB::table('detalle_asignacions')
        ->where('IdE' ,'=' ,$IdE)
        ->where('IdO' ,'=' ,$IdO)
        ->where('IdD' ,'=' ,$IdD)
        ->where('IdAct' ,'=' ,$IdAct)
        ->update(['deleted_at' => $fecha]);
        return back()->with('info', 'eliminado correctamente');
    }
    public function obtener_fecha_actual(){
        $fecha_actual = new Carbon();
        date_default_timezone_set('America/La_Paz');
        $time = strtotime($fecha_actual);
        $fechaLocal = date("Y-m-d H:i:s", $time);
        return $fechaLocal;
    }
    public function edit(
        $IdE,$IdO,$IdD,$IdAct
        ){

            $this->obj_asignacion = DB::table('detalle_asignacions')
            ->join('empresas', 'empresas.id', '=', 'detalle_asignacions.IdE')
            ->join('oficinas', 'oficinas.id', '=', 'detalle_asignacions.IdO')
            ->join('departamentos', 'departamentos.id', '=', 'detalle_asignacions.IdD')
            ->join('activos', 'detalle_asignacions.IdAct', '=', 'activos.id')
            ->join('tipo_activos', 'activos.IdTAct', '=', 'tipo_activos.id')
            ->select(
                    'activos.Codigo',
                    'activos.NroSerial',
                    'detalle_asignacions.IdE',
                    'detalle_asignacions.IdO',
                    'detalle_asignacions.IdD',
                    'detalle_asignacions.IdAct',
                    'tipo_activos.Nombre as activo',
                    'detalle_asignacions.UsuarioAsig',
                    'empresas.Nombre as empresa',
                    'oficinas.Direccion',
                    'departamentos.Nombre as departamento',
                    'detalle_asignacions.fecha_i',
                    'detalle_asignacions.fecha_f',
                    'detalle_asignacions.CapRecursos',
                    'detalle_asignacions.deleted_at'
                    )
                    ->where('IdE',$IdE)
                    ->where('IdO',$IdO)
                    ->where('IdD',$IdD)
                    ->where('IdAct',$IdAct)
                    ->get();
                    // dd($this->obj_asignacion[0]->IdO);
                    //  dd($this->obj_asignacion);


                $this->var_IdE =$this->obj_asignacion[0]->IdE;
                $this->var_IdO =$this->obj_asignacion[0]->IdO;
                $this->var_IdD =$this->obj_asignacion[0]->IdD;
                $this->var_IdAct =$this->obj_asignacion[0]->IdAct;
                $this->Codigo=$this->obj_asignacion[0]->Codigo;
                $this->NroSerial=$this->obj_asignacion[0]->NroSerial;

                // $this->fecha_i =$obj_asignacion->$fecha_i;
                // $this->fecha_f =$obj_asignacion->fecha_f;
                // $this->CapRecursos =$obj_asignacion->CapRecursos;
            // $this->obj_asignacion = Asignacion::where('IdE',$IdE)
            //     ->where('IdO',$IdO)
            //     ->where('IdD',$IdD)
            //     ->where('IdAct',$IdAct)
            //     ->get();


            $this->emit('dataSend');
            // $this->UsuarioAsig =$Usua_asig;



    }

}
