<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getStatusAttribute()
    {
        if ($this->end <= date('Y-m-d')) {

            return 'InActive';
            
        } else {

            return 'Active';

        }//end of if

    }//end of get status

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }//ebd of category

}//end of model
