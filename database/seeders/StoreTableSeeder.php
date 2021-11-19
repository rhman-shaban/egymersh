<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = ['store one','store tow','store three','store for'];

        foreach ($cat as $index=>$value) {
            
            \App\Models\Store::create([
                'seller_id'  => '1',
                'name'  => $value,
            ]);
            
        }//end of foreach

    }//end of run

}//end of class
