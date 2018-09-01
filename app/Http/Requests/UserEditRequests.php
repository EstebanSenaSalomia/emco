<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class UserEditRequests extends FormRequest
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
            'name'     => 'Min:7|Max:100|Required',
            'cedula'   => 'Required|unique:users,cedula,'.$this->route->parameter('user'),
            'telefono' => 'Required',
            'email'    => 'Min:4|Max:120|Required|unique:users,email,'.$this->route->parameter('user') 
        ];
    }

       public function messages()
    {
        return [
            
            'name.min' =>'por favor escribe el nombre completo'
        ];
    }
}
