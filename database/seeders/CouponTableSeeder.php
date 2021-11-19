<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Coupon::create([
            'name'          => 'test',
            'value'         => 60,
            'categories_id' => 1,
            'end'           => '2022-01-1 1:10:10',
        ]);

    }//end of run
    
}///end of clas
