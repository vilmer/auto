<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RqActualizarAuto extends FormRequest
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
            'placa' => 'required|max:255|string|unique:auto,placa,'.$this->input('id'),
            'color' => 'required|max:255|string',
            'descripcion'=>'nullable|max:255|string'
        ];
    }
}
