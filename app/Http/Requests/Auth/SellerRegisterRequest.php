<?php

namespace App\Http\Requests\Auth;

use App\Interfaces\Auth\RegisterRequestInterface;
use Illuminate\Foundation\Http\FormRequest;


class SellerRegisterRequest extends FormRequest implements RegisterRequestInterface
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
            'password'      => 'required|string|min:6',
            'confirm_password'  => 'same:password',
            'truck_name'        => 'required',
            'plate_no'          => 'required|unique:trucks',
            'license'           => 'mimes:jpeg,jpg,png|required|max:10000',
            'truck_images'      => 'required|array|min:4', // <----
            'truck_images.*'    => 'mimes:jpeg,jpg,png',
            'delivery'          => 'required|boolean',
            'role'              => 'required',
        ];
    }

}
