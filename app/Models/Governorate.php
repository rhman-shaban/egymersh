<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;

    public function add($data)
    {
        $this->name_ar = $data['name_ar'];
        $this->name_en = $data['name_en'];
        $this->active = $data['active'];
        return $this->save();   

    }//end of add 

    public function edit($data)
    {
        $this->name_ar = $data['name_ar'];
        $this->name_en = $data['name_en'];
        $this->active = $data['active'];
        return $this->save();
        
    }//endof edit

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            
            return $this->name_ar;

        } else {

            return $this->name_en;
            
        }//end of if

    }//end of get name


}//end of model
