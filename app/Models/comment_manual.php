<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_manual extends Model
{
    use HasFactory;
    protected $guarded = [];
  


    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }



    public function order_seller()
    {
        return $this->belongsTo(order_seller::class,'order_id');
    }
}
