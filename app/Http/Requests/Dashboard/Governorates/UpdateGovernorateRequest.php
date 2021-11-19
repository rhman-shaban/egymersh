<?php

namespace App\Http\Requests\Dashboard\Governorates;

use Illuminate\Foundation\Http\FormRequest;
use Request;
class UpdateGovernorateRequest extends FormRequest
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
        $id = Request::segment(4);
        return [
            'active' => 'required' , 
            'name_en' => 'required|unique:governorates,name_en,'.$id,
            'name_ar' => 'required|unique:governorates,name_ar,'.$id,
        ];
    }
}
