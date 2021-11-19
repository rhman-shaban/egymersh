<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = ['Get great devices up to 50% off <a href="#">View details</a>',
                    'Supper Value Deals - Save more with coupons',
                    'Trendy 25silver jewelry, save up 35% off today <a href="#">Shop now</a>'];
        foreach ($datas as $data) {
            
            \App\Models\Offer::create([
                'name_ar' => $data,
                'name_en' => $data,
            ]);
        }//end of foreach

    }//end of run

}//end of clas
