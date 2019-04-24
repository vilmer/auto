<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RqIngreseoAuto extends FormRequest
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
        $rgxPlaca="/^[A-Za-z]{4}[0-9]{4}\z/";
        
        $reg = "/^[\pL\s]+$/u";
        
        return [
            'placa' => 'required|regex:'.$rgxPlaca.'|unique:auto,placa',
            'color' => 'required|max:255|regex:'.$reg,
            'descripcion'=>'required|digits:4|integer|min:1900|max:'.date('Y'),
            'Propietario'=>'nullable|max:255|regex:'.$reg
        ];
    }


    public function messages()
    {
        return [
            'descripcion.required' => 'El campo año es obligatorio',
            'descripcion.digits'  => 'El campo año debe ser un número de 4 dígitos.',
            'descripcion.min'  => 'El campo año debe ser un mayor a 1900.',
            'descripcion.max'  => 'El campo año debe menor a '.date('Y'),
        ];
    }
}
