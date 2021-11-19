<?php

namespace App\Http\Requests\Dashboard\Slides;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideRequest extends FormRequest
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
            'image' => 'required|image' , 
            'title_ar' => 'nullable' , 
            'big_title_ar' => 'nullable' , 
            'button_text_ar' => 'nullable' , 
            'sub_title_ar' => 'nullable' , 
            'title_en' => 'nullable' , 
            'big_title_en' => 'nullable' , 
            'button_text_en' => 'nullable' , 
            'sub_title_en' => 'nullable' , 
            'link' => 'nullable|url' , 
            'active' => 'required' , 
        ];
    }
}
