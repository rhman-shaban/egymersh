<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }



    public function product()
    {
        return $this->belongsTo(SellerProduct::class , 'seller_product_id');
    }
}
