<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class addProductRequest extends FormRequest
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
            'name'          => ['required'],
            'price'         => ['required'],
            'calories'      => ['required'],
            //'images'        => ['mimes:jpeg,jpg,png|required|max:10000'],
            'images' => 'required|array|max:3', // <----
            'images.*' => 'mimes:jpeg,jpg,png',
            'description'   => ['required'],
        ];
    }
}
