<?php

namespace App\Http\Requests\food_types;

use Illuminate\Foundation\Http\FormRequest;

class ShowSectionProductsRequest extends FormRequest
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
            'section_id' => 'required',
            'truck_id'   => 'required',
        ];
    }
}
