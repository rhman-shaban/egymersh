<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function size()
    {
        return $this->belongsTo(Size::class , 'size_id');
    }//end pf size

    public function product()
    {
        return $this->belongsTo(Product::class);
    }//end of product

}//end of mpmodels
