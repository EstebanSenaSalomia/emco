<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViabilidadRequests extends FormRequest
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
            'numero'   => 'Min:10|Max:20|Required|unique:viabilidades',
            'direccion'=> 'Required',
            'red'      => 'Required'
        ];
    }
}