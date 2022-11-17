<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Content\Banner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BannerRequest extends FormRequest
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
            'image' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'url' => 'nullable|string|min:3|max:190',
            'title' => 'required|string|min:3|max:190',
            'position' => ['required', 'numeric',
//                Rule::in(Banner::$postBannersPositions)
            ],
        ];

        if (request()->method === 'PATCH') {
            $rules['image'] = 'nullable|mimes:jpg,jpeg,png|max:2048';
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'position' => 'مکان تبلیغ'
        ];
    }
}
