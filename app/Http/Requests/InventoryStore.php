<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryStore extends FormRequest
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
           'quantity'=>'required',
           'purchase_price'=>'required',
           'sale_price'=>'required',

        ];
    }
    public function messages()
    {
        return [
         'quantity.required'=>'El campo cantidad no puede quedar vacio',
         'purchase_price'=>'El campo precio de compra no puede quedar vacio',
         'sale_price'=>'El campo precio de venta no puede quedar vacio'
        ];
    }
}
