<?php

namespace App\Http\Requests\cahsout;

use Illuminate\Foundation\Http\FormRequest;

class ExecuteCashoutRequest extends FormRequest
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
            'amount' => 'required|numeric',
            'wallet_id' => 'required|exists:wallets,id',
            'bank_account_id' => 'required|exists:wallets,id',
        ];
    }
}
