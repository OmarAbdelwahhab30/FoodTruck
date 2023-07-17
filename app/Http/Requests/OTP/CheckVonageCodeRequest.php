<?php

namespace App\Http\Requests\OTP;

use Illuminate\Foundation\Http\FormRequest;

class CheckVonageCodeRequest extends FormRequest
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
            'code'          => ['required','digits:4'],
            'request_id'    => ['required']
        ];
    }
}
