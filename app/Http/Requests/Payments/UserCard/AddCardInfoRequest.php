<?php

namespace App\Http\Requests\Payments\UserCard;

use Illuminate\Foundation\Http\FormRequest;

class AddCardInfoRequest extends FormRequest
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
            'name_on_card'    => 'required',
            'card_number'     => 'required',
            'expiry_date'     => 'required',
            'cvv'             => 'required',
            'card_type'       => 'required',
        ];
    }
}
