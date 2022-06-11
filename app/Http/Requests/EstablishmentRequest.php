<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstablishmentRequest extends FormRequest
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
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required',
            'establishment_areas_id' => 'required',
            'owner' => 'required',
            'establishment_types_id' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo "Nombre de establecimiento" es obligatorio.',
            'location.required' => 'El campo "Dirección Establecimiento" es obligatorio.',
            'capacity.required' => 'El campo "Capacidad" es obligatorio.',
            'establishment_areas_id.required'=>'El campo "Areas Establecimiento" es obligatorio.',
            'owner.required'=>'El campo "Dueño Establecimiento" es obligatorio.',
            'establishment_types_id.required'=>'El campo "Tipo Establecimiento" es obligatorio.',


        ];
    }
}
