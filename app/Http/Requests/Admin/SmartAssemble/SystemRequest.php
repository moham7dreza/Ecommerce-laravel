<?php

namespace App\Http\Requests\Admin\SmartAssemble;

use Illuminate\Foundation\Http\FormRequest;

class SystemRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'description' => 'required|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'system_user_type' => 'nullable|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'system_marketable' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'system_category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_categories,id',
                'system_type_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_types,id',
                'system_gen_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_gens,id',
                'system_config_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_configs,id',
                'published_at' => 'required|numeric',
            ];
        }
        else{
            return [
                'description' => 'required|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'system_user_type' => 'nullable|max:500|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'system_marketable' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'system_category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_categories,id',
                'system_type_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_types,id',
                'system_gen_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_gens,id',
                'system_config_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_configs,id',
                'published_at' => 'required|numeric',
            ];
        }
    }
}
