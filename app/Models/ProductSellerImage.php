<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSellerImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_path'];

    public function products_seller()
    {
        return $this->belongsTo(SellerProduct::class,'seller_products_id');

    }//end of belongsTo product_image

    public function getImagePathAttribute()
    {
        return asset('storage/products_seller/' . $this->image);

    }//end of get image path
    
}//end of model
