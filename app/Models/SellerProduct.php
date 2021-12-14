<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_path','defult_logo'];

    public function getImagePathAttribute()
    {
        return asset('storage/products_seller/' . $this->defult_image);

    }//end of get image path

    public function getDefultLogoAttribute()
    {
        return asset('storage/products_seller/' . $this->logo);

    }//end of get front_image path

    public function product()
    {
        return $this->belongsTo(Product::class);
    }//ebd of swller product

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }//ebd of swller store

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }//ebd of swller category

    public function seller()
    {
        return $this->belongsTo(Seller::class,'seller_id');
    }//ebd of swller seller

    public function product_Color()
    {
        return $this->belongsToMany(ProductColor::class,'seller_product_colors');
    }//end of product_color

    public function product_seller_image()
    {
        return $this->hasMany(ProductSellerImage::class,'seller_products_id');
    }//endof product_seller_image
    
    public function product_order(){
        return $this->hasMany(product_order::class);
    }

    

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title' , 'like', "%$search%")
            ->orWhere('tag', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%");
            
        });

    }//end of scopeWhenSearch

}//end fo model
