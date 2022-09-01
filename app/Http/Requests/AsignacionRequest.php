<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'IdE' => 'required',
            'IdO' => 'required',
            'IdD' => '',
            'IdAct' => '',
            'fecha_i' => '',
        ];
    }
    public function messages(){
        return [
            'IdE.required' => 'El campo Empresa es Obligatorio',
            'IdO.required' => 'El campo Oficina es Obligatorio',
            'IdD.required' => 'El campo Departamento es Obligatorio',
            'IdAct.required' => 'El campo Activo es Obligatorio',
            'fecha_i.required' => 'El campo Fecha Incial es Obligatorio',
        ];
    }
}
