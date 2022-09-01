<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoActivoRequest extends FormRequest
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
            'Nombre' => 'required|unique:tipo_activos',
        ];
    }
    public function messages(){
        return [
            'Nombre.required' => 'El campo Nombre es Obligatorio'
        ];
    }
}
