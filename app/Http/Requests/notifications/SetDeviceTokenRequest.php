<?php

namespace App\Http\Requests\notifications;

use Illuminate\Foundation\Http\FormRequest;

class SetDeviceTokenRequest extends FormRequest
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
            'device_token' => ['required'],
        ];
    }
}
