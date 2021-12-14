<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{

    use HasFactory, Notifiable;

    use HasFactory;

    protected $guarded = [];

    protected $guard = 'seller';

    protected $hidden = ['password', 'remember_token'];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {
            
            return $q->where('name' , 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('user_name', 'like', "%$search%")
            ->orWhere('country', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%");
        });
        
    }//end ofscopeWhenSearch`  

    public function store()
    {
        return $this->hasMany(Store::class, 'seller_id');

    }//end of store

    public function sellerProduct()
    {
        return $this->hasMany(SellerProduct::class, 'seller_id');
    }//end of sellerProduct

    public function order_seller(){

        return $this->hasMany(sellers::class,'seller_id');

    }//end of order_seller

    public function reply()
    {
        return $this->hasMany(Reply::class,'seller_id');

    }//end of reply

    public function wishlist()
    {
        return $this->hasMany(WishList::class , 'user_id');

    }//end of wishlist
    
}//enf of mode
