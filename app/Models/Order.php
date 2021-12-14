<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function address()
    {
        return $this->belongsTo(UserAddress::class , 'address_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');

    }



    public function status()
    {
        return $this->belongsTo(OrderStatus::class , 'order_status_id');
    }


    public function comments()
    {
        return $this->hasMany(OrderComment::class);
    }
}
