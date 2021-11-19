<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ['product one','product tow','product three','product for','product 5','product 6','product 7'];

        foreach ($products as $index=>$product) {
            
            \App\Models\Product::create([
                'name_en'     => $product,
                'name_ar'     => $product,
                'category_id' => '1',
                'admin_id'    => 1,
                'price'       => 120,
            ]);
            
        }//end of foreach

        foreach ($products as $index=>$product) {
            
            \App\Models\Product::create([
                'name_en'     => $product,
                'name_ar'     => $product,
                'category_id' => '2',
                'admin_id'    => 1,
                'price'       => 200,
            ]);
            
        }//end of foreach

        foreach ($products as $index=>$product) {
            
            \App\Models\Product::create([
                'name_en'     => $product,
                'name_ar'     => $product,
                'category_id' => '3',
                'admin_id'    => 1,
                'price'       => 250,
            ]);
            
        }//end of foreach

    }//end of run
    
}//endf of class
