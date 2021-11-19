<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function add($data)
    {
        $this->name_ar        = $data['name_ar'];
        $this->name_en        = $data['name_en'];
        $this->description_en = $data['description_en'];
        $this->description_ar = $data['description_ar'];
        $this->active         = $data['active'];
        $this->category_id    = $data['category_id'];
        $this->price          = $data['price'];
        $this->admin_id       = Auth::guard('admin')->id();
        return $this->save();
    }//end of add

    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function edit($data)
    {
        $this->name_ar        = $data['name_ar'];
        $this->name_en        = $data['name_en'];
        $this->description_en = $data['description_en'];
        $this->description_ar = $data['description_ar'];
        $this->active         = $data['active'];
        $this->category_id    = $data['category_id'];
        $this->price          = $data['price'];
        return $this->save();
    }

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {

            return $this->name_ar;
            
        } else {

            return $this->name_en;
        }
    }//end of name Locale

    public function categoy()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }//en of categoy

    public function colors()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }//end of color

    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }//end of size

    public function sellerProduct()
    {
        return $this->hasMany(SellerProduct::class , 'product_id');
    }//end of sellerProduct

    // 127.0.0.1:8000/storage/products/front-default.png

}//end of model
