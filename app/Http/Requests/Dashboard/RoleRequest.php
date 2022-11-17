<?php

namespace App\Http\Requests\Dashboard;

use App\Models\User\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
    public function rules(): array
    {
        $route = Route::current();
        if ($route->getName() === 'adminto.role.store') {
            return [
                'name' => 'required|max:120|min:1',
                'description' => 'required|max:200|min:1',
                'status' => ['required', 'numeric', Rule::in(Role::$statuses)],
                'permissions.*' => 'exists:permissions,id'
            ];
        } else {
            return [
                'name' => 'required|max:120|min:1',
                'description' => 'required|max:200|min:1',
                'status' => ['required', 'numeric', Rule::in(Role::$statuses)],
            ];
        }
    }

    public function attributes(): array
    {
        return ['permissions' => 'دسترسی ها'];
    }
}
