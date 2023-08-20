<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class addOptionalRequest extends FormRequest
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
            'optional' => ['required'],
            'price' => ['required'],
            'product_id' => ['required'],
        ];
    }
}
