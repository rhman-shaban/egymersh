<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Category extends Model
{
    use HasFactory;

     public function add($data)
    {
        $this->name_en = $data['name_en'];
        $this->name_ar = $data['name_ar'];
        $this->sort = $data['sort'];
        $this->parent_id = isset($data['parent_id']) ? $data['parent_id'] : null;
        $this->admin_id = Auth::guard('admin')->id();
        $this->active = $data['active'];
        return $this->save();
    }//end of add


    public function edit($data)
    {
        $this->name_en = $data['name_en'];
        $this->name_ar = $data['name_ar'];
        $this->sort = $data['sort'];
        $this->parent_id = isset($data['parent_id']) ? $data['parent_id'] : null;
        $this->active = $data['active'];
        return $this->save();
    }//end of edit


    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }//end fo adadmin


    public function parent()
    {
        return $this->belongsTo(Category::class , 'parent_id');
    }//endf o parent

    public function categories()
    {
        return $this->hasMany(Category::class ,  'parent_id');
    }//end of categories

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }//ebd of product

    public function coupon()
    {
        return $this->hasMany(Coupon::class, 'categories_id');
    }//ebd of coupon

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
