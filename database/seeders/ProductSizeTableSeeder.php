<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $col = ['#d82a2a','#2a59d8','#46d82a','#fd8a14','#e320f2','#f2208d'];

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '1',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '1',
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '2',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '2',
            ]);
            
        }//end of foreach

                foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '3',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '1',
            ]);
            
        }//end of foreach

                foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '4',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '1',
            ]);
            
        }//end of foreach

                foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '5',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '1',
            ]);
            
        }//end of foreach

                foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '6',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '1',
            ]);
            
        }//end of foreach

                foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '7',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '1',
            ]);
            
        }//end of foreach

                foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '8',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '1',
            ]);
            
        }//end of foreach

                foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '9',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '1',
            ]);
            
        }//end of foreach

                foreach ($col as $index=>$value) {
            
            \App\Models\ProductSize::create([
                'product_id'       => '10',
                'size_id'          => '1',
                'quantity'         => '14',
                'product_color_id' => '1',
            ]);
            
        }//end of foreach
    }
}
