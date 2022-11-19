<?php

namespace App\Http\Requests\Panel\Content;

use App\Models\Content\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            'category_id' => 'required|exists:post_categories,id',
            'title' => 'required|string|min:3|max:190|unique:posts,title',
            'time_to_read' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'status' => ['required', Rule::in(Post::$statuses)],
            'commentable' => ['required', 'numeric', 'in:0,1'],
            'type' => ['required', Rule::in(Post::$types)],
            'body' => 'required|string|min:3',
            'summary' => 'required|string|min:3',
            'published_at' => 'required|numeric',
            'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
        ];

        if (request()->method === 'PATCH') {
//            $rules['title'] = 'required|string|min:3|max:190|unique:articles,title,' . request()->id;
            $rules['image'] = 'nullable|mimes:jpg,jpeg,png|max:2048';
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'time_to_read' => 'زمان برای خوانده شدن',
        ];
    }
}
