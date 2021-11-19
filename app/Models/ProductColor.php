<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductColor extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class);

    }//end of product
    
    public function sizes()
    {
        return $this->hasMany(ProductSize::class , 'product_color_id');
    }//end of size sizes



    public function seller_product()
    {
        return $this->belongsToMany(SellerProduct::class,'seller_product_colors');
    }//end of product_color

}//end of model
