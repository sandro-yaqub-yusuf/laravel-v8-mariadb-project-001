<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

/**
 * Class ProductIndexRequest
 * @package App\Http\Requests
 */
class ProductIndexRequest extends PaginateRequest
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
        $rules = [
            'order_column'    => 'nullable|string|in:id,name',
            'order_direction' => 'nullable|order_direction',
            'per_page'        => 'nullable|integer',
            'page'            => 'nullable|integer',
            'name'            => 'nullable|string'
        ];
        
        return $rules + parent::rules();
    }
}
