<?php

namespace App\Http\Requests\Admin\SmartAssemble;

use Illuminate\Foundation\Http\FormRequest;

class SystemMenuRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'brief' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
//                'url' => 'required|max:500|min:5',
                'status' => 'required|numeric|in:0,1',
                'show_in_menu' => 'numeric|in:0,1',
                'parent_id' => 'nullable|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_menus,id',
                'price' => 'nullable|numeric',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            ];
        } else {
            return [
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'brief' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
//                'url' => 'required|max:500|min:5',
                'status' => 'required|numeric|in:0,1',
                'show_in_menu' => 'numeric|in:0,1',
                'parent_id' => 'nullable|min:1|max:100000000|regex:/^[0-9]+$/u|exists:system_menus,id',
                'price' => 'nullable|numeric',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            ];
        }
    }
}
