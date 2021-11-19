<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_order extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function order_seller(){
        return $this->belongsTo(OrderItem::class);
    }

    public function SellerProduct(){
        return $this->belongsTo(SellerProduct::class);
    }
}
