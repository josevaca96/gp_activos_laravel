<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Empresa;
use App\Activo;
use App\Oficina;
use App\Departamento;
use App\TipoActivo;

class ComplementosDetalle extends Component
{
    public function render()
    {
        return view('livewire.complementos-detalle',[
            'empresas' => Empresa::all(),
            'oficinas' => Oficina::all(),
            'departamentos' => Departamento::all(),
            'tipo_activos' => TipoActivo::pluck('Nombre', 'id'),
            'codigo'       =>$this->traer_codigo()
    ]);
    }
    function traer_codigo()
    {
        $objActivo= new Activo;
        $codigo=$objActivo->obtener_codigo();
        return $codigo;
    }
}
