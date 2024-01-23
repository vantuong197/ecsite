<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users|max:255',
            'name' => 'required|string',
            'user_catalogue_id' => 'required|gt:0|integer',
            'password' => 'required|string|min:5',
            'confirm_password' => 'same:password|required'
        ];
    }

    public function messages(): array{
        return [
            'user_catalogue_id.gt' => 'The User Catalogue is required',
            'nane.required' => 'The Name field is required',
            'confirm_password.required' => 'The Confirm Password field is required'
        ];
    }
}
