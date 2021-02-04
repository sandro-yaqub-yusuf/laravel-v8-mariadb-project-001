<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2',
            'image_upload' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
            'quantity' => 'required|numeric|min:0',
            'cost_price' => 'required|numeric|min:0',
            'sales_price' => 'required|numeric|min:0'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Produto',
            'description' => 'Descrição',
            'image' => 'Imagem Upload',
            'quantity' => 'Quantidade',
            'cost_price' => 'Preço de Custo',
            'sales_price' => 'Preço de Venda'
        ];
    }    
}
