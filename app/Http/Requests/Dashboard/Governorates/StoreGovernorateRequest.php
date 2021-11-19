<?php

namespace App\Http\Requests\Dashboard\Governorates;

use Illuminate\Foundation\Http\FormRequest;

class StoreGovernorateRequest extends FormRequest
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
        return [
            'active' => 'required' , 
            'name_en' => 'required|unique:governorates',
            'name_ar' => 'required|unique:governorates',
        ];
    }
}
