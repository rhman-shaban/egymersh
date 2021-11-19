<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLocalization;
class UserAddress extends Model
{
    use HasFactory;




    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }



    public function fullAddress()
    {
        $lang = LaravelLocalization::getCurrentLocale();
        return optional($this->governorate)['name_'.$lang].' '.$this->city.' '.$this->full_address;
    }
}
