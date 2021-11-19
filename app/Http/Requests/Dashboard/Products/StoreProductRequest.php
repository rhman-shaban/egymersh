<?php

namespace App\Http\Requests\Dashboard\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name_ar' => 'required' , 
            'name_en' => 'required' , 
            'category_id' => 'required' , 
            'price' => 'required' , 
            'description_ar' => 'nullable' , 
            'description_en' => 'nullable' , 
            'back_images' => 'required|array' , 
            'front_images' => 'required|array' , 
            'sort' => 'nullable' , 
            'active' => 'required' , 
            'colors' => 'array|required' , 
            'sizes' => 'array|required' , 
            'quantity' => 'array|required' , 
        ];
    }
}
