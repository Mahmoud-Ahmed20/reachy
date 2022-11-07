<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyreRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:buyers,email', 'max:255'],
            'password' => ['sometimes', 'required', 'confirmed', 'max:255'],
            'newpassword' => ['confirmed', 'max:255'],
            'first_name' => ['required', 'max:60'],
            'second_name' => ['required', 'max:60'],
            'gendar' => ['required', 'max:60'],
            'favorite_payment' => ['required', 'max:60'],
            'inactive' => 'required',
            'avatar' => ['image', 'mimes:jpeg,jpg,png', 'max:700'],
            'phone_number' => ['sometimes', 'required', 'unique:buyers,phone_number', 'max:30'],

        ];
    }
}
