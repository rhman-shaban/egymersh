<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = ['cat one','cat tow','cat three'];

        foreach ($cat as $value) {
            
            \App\Models\Category::create([
                'name_en'  => $value,
                'name_ar'  => $value,
                'admin_id' => 1,
            ]);
            
        }//end of foreach

    }//enf of run
    
}//end of class
