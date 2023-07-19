<?php

namespace App\Http\Requests\Reviews;

use Illuminate\Foundation\Http\FormRequest;

class CustomerReviewsRequest extends FormRequest
{
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
            'review' => ['required', 'max:255'],
            'rate' => ['required', 'numeric', 'between:0.00,5.00'],
            'customer_id'  => ['required'],
        ];
    }
}
