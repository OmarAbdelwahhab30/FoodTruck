<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'   => 'nullable|string|unique:users',
            'email'  => 'nullable|email|unique:users',
            'phone'  => ['nullable',"min:4","unique:users"],
            'password'      => 'nullable|string|min:6',
            'confirm_password'  => 'same:password',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10000',
        ];
    }
}
