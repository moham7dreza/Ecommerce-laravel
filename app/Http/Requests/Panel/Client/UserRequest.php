<?php

namespace App\Http\Requests\Panel\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'last_name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'mobile' => ['required', 'digits:11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'unique:users', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'activation' => 'required|numeric|in:0,1',
        ];
        if (request()->method === 'PATCH') {
            $rules['password'] = 'nullable';
        }

        return $rules;
    }
}
