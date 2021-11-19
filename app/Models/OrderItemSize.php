<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemSize extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function order_iteam_size()
    {
        return $this->belongsTo(OrderItem::class);
    }//end of belongsTo OrderItem

}//en dof model
