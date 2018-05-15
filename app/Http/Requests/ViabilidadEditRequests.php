<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ViabilidadEditRequests extends FormRequest
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
            'nombre'   => 'Min:10|Max:100|Required',
            'numero'   => 'Min:10|Max:20|Required|unique:viabilidad,numero,$id',
            'direccion'=> 'Required',
            'red'      => 'Required'
        ];
    }

    

}
