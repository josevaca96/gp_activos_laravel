<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivoRequest extends FormRequest
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
            'Codigo' => 'required|unique:activos',
        ];
    }

    public function messages(){
        return [
            'Codigo.required' => 'El campo Codigo es Obligatorio',
            'Codigo.unique' => 'El campo Código tiene que ser único',
        ];
    }
}
