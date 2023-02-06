<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'cat_id' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Product name is required',
            'price.required' => 'Product price is required',
            'description.required' => 'Product description is required',
            'image.required' => 'Product image is required',
            'cat_id.required' => 'Product Category is required',
        ];
    }
}
