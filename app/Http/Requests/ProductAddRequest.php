<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:10',
            'price' => 'required',
            'category_id'=>'required',
            'contents'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Ten san pham khong duoc de trong',
            'price.required' => 'Gia san pham khong duoc de trong',
            'category_id.required' => 'Category khong duoc de trong',
            'contents.required' => 'Content khong duoc de trong',
        ];
    }
}
