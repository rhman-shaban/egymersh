<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProductColor extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $guarded = [];

    public function product_color()
    {
        return $this->belongsTo(ProductColor::class,'product_color_id');
    }//end of product

}//end of model
