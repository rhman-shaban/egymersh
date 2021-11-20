<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_seller extends Model
{
    use HasFactory;
    protected $guarded = [];




    public function product_order(){
        return $this->hasMany(product_order::class,'order_id');
    }
}


