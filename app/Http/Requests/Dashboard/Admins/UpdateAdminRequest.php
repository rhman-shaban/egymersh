<?php

namespace App\Http\Requests\Dashboard\Admins;

use Illuminate\Foundation\Http\FormRequest;
use Request;
class UpdateAdminRequest extends FormRequest
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
            'name' => 'required|string',
            'username' => 'required|unique:admins,username,'.$id,
            'password' => 'nullable|min:8|confirmed',
            'active' => 'required' , 
            'image' => 'nullable|image' , 
        ];
    }
}
