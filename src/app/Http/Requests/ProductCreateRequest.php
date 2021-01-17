<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,jpg,png|max:1024',
            'quantity' => 'required|numeric|min:0',
            'cost_price' => 'required|numeric|min:0',
            'sales_price' => 'required|numeric|min:0'
        ];
    }
}
