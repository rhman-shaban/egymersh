<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_seller extends Model
{
    use HasFactory;
    protected $guarded = [];


    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('seller_id', 'like', '%'.$search.'%');
                
    }

    public function product_order(){
        return $this->hasMany(product_order::class,'order_id');
    }
    public function seller(){
        return $this->belongsTo(seller::class,'seller_id');
    }
    public function comments()
    {
        return $this->hasMany(comment_manual::class,'order_id');
    }
    
}


