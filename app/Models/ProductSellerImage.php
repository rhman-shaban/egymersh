<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSellerImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products_seller()
    {
        return $this->belongsTo(SellerProduct::class,'seller_products_id');
    }//endof product_image
    
}//end of model
