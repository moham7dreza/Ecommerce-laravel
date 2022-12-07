<?php

namespace App\Http\Requests\Panel\Office;

use App\Models\ItCity\Office\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
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
            'category_id' => 'nullable|exists:product_categories,id',
            'name' => 'required|string|min:3|max:190',
            'time_to_give_service' => 'required|numeric',
            'warranty_time' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'status' => ['required', Rule::in(Service::$statuses)],
            'service_availability' => ['required', 'numeric', 'in:0,1'],
            'parent_id' => 'nullable|min:1|max:100000000|regex:/^[0-9]+$/u|exists:product_categories,id',
            'description' => 'required|string|min:3',
            'available_date' => 'nullable|numeric',
            'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
        ];

        if (request()->method === 'PATCH') {
            $rules['image'] = 'nullable|mimes:jpg,jpeg,png|max:2048';
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'warranty_time' => 'مدت زمان گارانتی سرویس',
            'time_to_give_service' => 'مدت زمان ارائه سرویس',
        ];
    }
}
