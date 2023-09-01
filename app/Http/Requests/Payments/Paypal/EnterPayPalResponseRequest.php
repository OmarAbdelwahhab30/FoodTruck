<?php

namespace App\Http\Requests\Payments\Paypal;

use Illuminate\Foundation\Http\FormRequest;

class EnterPayPalResponseRequest extends FormRequest
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
            'payment_status' => ['required'],
            'payment_response' => ['nullable', 'json'],
            'customer_id' => ['required'],
            'order_id' => ['required'],
            'payment_id' => ['required'],
            'payer_email' => ['nullable'],
            'currency' => ['required'],
            'seller_id' => ['required'],
            'amount'    => ['required']
        ];
    }
}
