<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
          'email' => [ 'required','email','unique:sellers,email', 'max:255'],
          'password' => ['sometimes', 'required', 'confirmed', 'max:255'],
          'newpassword' => ['confirmed', 'max:255'],
          'first_name' => ['required', 'max:60'],
          'second_name' => ['required', 'max:60'],
          'user' =>  [ 'required','unique:sellers,user', 'max:255'],
          'commercial_register' => 'max:10000|mimes:jpeg,jpg','max:700',
          'tax_register' => 'max:10000|mimes:jpeg,jpg','max:700',
        //   'inactive' => 'required',
          'avatar' => ['image', 'mimes:jpeg,jpg,png', 'max:700'],
          'phone' => ['sometimes', 'required', 'unique:sellers,phone', 'max:30'],

        ];
    }
}
