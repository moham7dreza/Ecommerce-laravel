<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Content\PostCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $rules = [
            'parent_id' => 'nullable|exists:post_categories,id',
            'name' => 'required|string|min:3|max:190',
            'description' => 'nullable|string|min:3',
            'image' => 'nullable',
            'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'status' => ['required', 'numeric' ,'string', Rule::in(PostCategory::$statuses)],
        ];

        if (request()->method === 'PATCH') {
            $rules['image'] = 'nullable';
        }

        return $rules;
    }
}
