<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequests extends FormRequest
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
            'name'     => 'Min:4|Max:100|Required',
            'email'    => 'Min:4|Max:120|Required|unique:users',
            'password' => 'Min:6|Max:100|Required'
        ];
    }
}
