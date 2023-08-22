<?php

namespace App\Http\Requests\Auth;

use App\Interfaces\Auth\RegisterRequestInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class CustomerRegisterRequest extends FormRequest implements RegisterRequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'      => 'required|string|unique:users|max:191',
            'phone'         => 'required|max:20|unique:users',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/',
            ],
            'confirm_password'  => 'same:password',
            'email'             => "email|nullable",
            'role'              => 'required',
            'image'             => 'nullable|mimes:jpeg,jpg,png|max:10000'
        ];
    }


}
