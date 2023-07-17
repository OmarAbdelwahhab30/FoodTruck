<?php

namespace App\Http\Requests\food_types;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class GetTruckRequest extends FormRequest
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
            'id'    => 'required',
        ];
    }
}
