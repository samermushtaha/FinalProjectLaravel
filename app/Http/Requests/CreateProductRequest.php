<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|String',
            'description' => 'required|String',
            'store_id' => 'required',
            'base_price' => 'required',
            'discount_price' => 'required|numeric|min:0|max:100',
            'image' => 'required',
            'sale' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.String' => 'Name should be string',
            'description.required' => 'Description is required',
            'description.String' => 'Description should be string',
            'store_id.required' => 'Store is required',
            'image.required' => 'Store is required',
            'base_price.required' => 'Base Price is required',
            'discount_price.required' => 'Discount Price is required',
            'discount_price.min' => 'Discount Price should be more than 1 and less than 100',
            'sale.required' => 'Discount Price should be double',
        ];
    }
}
