<?php

namespace App\Http\Requests\Payments\UserCard;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCardInfoRequest extends FormRequest
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
            'card_id'   => ['required','exists:cards,id']
        ];
    }
}
