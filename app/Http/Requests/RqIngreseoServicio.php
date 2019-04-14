<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RqIngreseoServicio extends FormRequest
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
        $decimal_rgx = "/^[0-9,]+(\.\d{0,2})?$/";
        return [
            'nombre' => 'required|unique:servicio,nombre|max:255|string',
            'precio' => 'required|regex:'.$decimal_rgx,
            'descripcion'=>'nullable|max:255|string'
        ];
    }
}
