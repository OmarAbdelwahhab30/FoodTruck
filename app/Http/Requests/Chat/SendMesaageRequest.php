<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendMesaageRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'to_user'       => 'required|exists:users,id',
            'record'        => ['required_without_all:text,file','nullable','file'],
            'file'          => ['required_without_all:text,record','nullable','mimes:jpeg,jpg,png,gif|max:10000'],
            'text'          => ['required_without_all:file,record','string','nullable'],

        ];
    }

}
