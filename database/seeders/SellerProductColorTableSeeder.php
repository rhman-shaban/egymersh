<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SellerProductColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = ['1','2','3','4','5','6'];

        foreach ($id as $value) {
            
            \App\Models\SellerProductColor::create([
                'seller_product_id'  => '1',
                'product_color_id'   => $value,
            ]);
            
        }//end of foreach

        foreach ($id as $value) {
            
            \App\Models\SellerProductColor::create([
               'seller_product_id'  => '2',
                'product_color_id'   => $value,
            ]);
            
        }//end of foreach

        foreach ($id as $value) {
            
            \App\Models\SellerProductColor::create([
                'seller_product_id'  => '3',
                'product_color_id'   => $value,
            ]);
            
        }//end of foreach

        foreach ($id as $value) {
            
            \App\Models\SellerProductColor::create([
                'seller_product_id'  => '4',
                'product_color_id'   => $value,
            ]);
            
        }//end of foreach

        foreach ($id as $value) {
            
            \App\Models\SellerProductColor::create([
                'seller_product_id'  => '5',
                'product_color_id'   => $value,
            ]);
            
        }//end of foreach
    }
}
