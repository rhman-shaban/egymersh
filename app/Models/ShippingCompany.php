<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
    use HasFactory;

    public function add($data)
    {
        $this->name = $data['name'];
        $this->active = $data['active'];
        $this->main = isset($data['main']) ? 1 : null;
        return $this->save();
    }

    public function prices()
    {
        return $this->hasMany(ShippingCompanyPrice::class , 'shipping_company_id');
    }
}
