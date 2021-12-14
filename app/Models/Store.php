<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['logo_path','banner_path'];

    public function getlogoPathAttribute()
    {
        return asset('storage/' . $this->logo);

    }//end of get logo path

    public function getbannerPathAttribute()
    {
        return asset('storage/' . $this->banner);

    }//end of get banner path

    public function product()
    {
        return $this->hasMany(SellerProduct::class,'store_id');
    }//end of product

    public function store_product()
    {
        return $this->hasMany(SellerProduct::class,'store_id');
    }//ebd of swller color product
    
}//end of model
