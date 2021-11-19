<?php

namespace App\Http\Requests\Site\Messages;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'name' => 'nullable', 
            'email' => 'required|email' , 
            'subject' => 'nullable' , 
            'message' => 'required' , 
            'phone' => 'required' , 
        ];
    }
}
