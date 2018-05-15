<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Route;

class ViabilidadEditRequests extends FormRequest
{
    protected $route;

    public function __construct(Route $route){

        $this->route = $route;

    }//con este metodo llamo a las variables que se pasan por la ruta (esteban)
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

           //'numero'   => 'Min:10|Max:20|Required|unique:viabilidades,numero,'.$this->route->parameter('viabilidad'),

            'numero'   =>  ['Min:10',
                            'Max:20',
                            'required',
                             Rule::unique('viabilidades')->ignore($this->route->parameter('viabilidad'))
                         ],              
            'direccion'=> 'Required',
            'red'      => 'Required'
        ];
    }
}
