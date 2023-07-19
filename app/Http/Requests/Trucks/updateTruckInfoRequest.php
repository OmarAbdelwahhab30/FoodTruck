<?php

namespace App\Http\Requests\Trucks;

use Illuminate\Foundation\Http\FormRequest;

class updateTruckInfoRequest extends FormRequest
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
            'id'  => ['required'],
            'name'      => ['sometimes'],
            'truck_images'      => 'sometimes|array', // <----
            'truck_images.*'    => 'mimes:jpeg,jpg,png',
        ];
    }
}
