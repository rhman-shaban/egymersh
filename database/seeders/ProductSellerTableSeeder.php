<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['1','2','3','4','5','6','7','8','9'];

        foreach ($data as $value) {

            \App\Models\SellerProduct::create([
                'store_id'      => '1',
                'seller_id'     => '1',
                'category_id'   => '1',
                'product_id'    => '1',
                'image'         => 'default.png',
                'title'         => 'product title',
                'tag'           => 'product tag',
                'description'   => 'description',
                'price'         => '200',
                'selling_price' => '50',
            ]);
            
        }//end of foreach

        foreach ($data as $value) {
            
            \App\Models\SellerProduct::create([
                'store_id'      => '2',
                'seller_id'     => '1',
                'category_id'   => '1',
                'product_id'    => '1',
                'image'         => 'default.png',
                'title'         => 'product title',
                'tag'           => 'product tag',
                'description'   => 'description',
                'price'         => '200',
                'selling_price' => '50',
            ]);
            
        }//end of foreach

        foreach ($data as $value) {
            
            \App\Models\SellerProduct::create([
                'store_id'      => '3',
                'seller_id'     => '1',
                'category_id'   => '1',
                'product_id'    => '1',
                'image'         => 'default.png',
                'title'         => 'product title',
                'tag'           => 'product tag',
                'description'   => 'description',
                'price'         => '200',
                'selling_price' => '50',
            ]);
            
        }//end of foreach

        foreach ($data as $value) {
            
            \App\Models\SellerProduct::create([
                'store_id'      => '4',
                'seller_id'     => '1',
                'category_id'   => '1',
                'product_id'    => '1',
                'image'         => 'default.png',
                'title'         => 'product title',
                'tag'           => 'product tag',
                'description'   => 'description',
                'price'         => '200',
                'selling_price' => '50',
            ]);
            
        }//end of foreach

    }//end of run
}
