<?php

namespace App\Http\Requests\Admin\SmartAssemble;

use Illuminate\Foundation\Http\FormRequest;

class SystemComponentsRequest extends FormRequest
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
                'case' => 'exists:products,id',
                'cpu' => 'exists:products,id',
                'gpu' => 'exists:products,id',
                'fan' => 'exists:products,id',
                'motherboard' => 'exists:products,id',
                'cooler' => 'exists:products,id',
                'ram' => 'exists:products,id',
                'hdd' => 'exists:products,id',
                'ssd' => 'exists:products,id',
                'psu' => 'exists:products,id',
            ];
        }
        else{
            return [
                'case' => 'exists:products,id',
                'cpu' => 'exists:products,id',
                'gpu' => 'exists:products,id',
                'fan' => 'exists:products,id',
                'motherboard' => 'exists:products,id',
                'cooler' => 'exists:products,id',
                'ram' => 'exists:products,id',
                'hdd' => 'exists:products,id',
                'ssd' => 'exists:products,id',
                'psu' => 'exists:products,id',
            ];
        }
    }
}
