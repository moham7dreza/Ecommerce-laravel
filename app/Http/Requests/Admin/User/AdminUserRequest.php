<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;

class AdminUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
//        if($this->isMethod('post')){
        $route = Route::current();
        if ($route->getName() === 'admin.user.admin-user.store') {
            return [
                'first_name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'last_name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'mobile' => ['required', 'digits:11', 'unique:users'],
                'email' => ['required', 'string', 'email', 'unique:users'],
                'password' => ['required', 'unique:users', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
                'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                'activation' => 'required|numeric|in:0,1',
                'roles.*' => 'exists:roles,id'
            ];
        } elseif ($route->getName() === 'admin.user.admin-user.update') {
            return [
                'first_name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'last_name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            ];
        } elseif ($route->getName() === 'admin.user.admin-user.role-update') {
            return [
                'roles.*' => 'exists:roles,id'
            ];
        }

    }
}
