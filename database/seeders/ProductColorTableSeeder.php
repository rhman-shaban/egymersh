<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $col = ['#ff8ff8','#ff596d','#ffdb33','#ffbb51','#80e6ff','#f2208d'];

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '1'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '2'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '3'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '4'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '5'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '6'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '7'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '8'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '9'
            ]);
            
        }//end of foreach


        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '10'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '11'
            ]);
            
        }//end of foreach


        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '12'
            ]);
            
        }//end of foreach

        foreach ($col as $index=>$value) {
            
            \App\Models\ProductColor::create([
                'color'      => $value,
                'product_id' => '13'
            ]);
            
        }//end of foreach

    }//end of run

}//end of classs
