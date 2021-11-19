<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $col = ['XXL','LG','LM','XL','MD'];

        foreach ($col as $value) {
            
            \App\Models\Size::create([
                'name'       => $value,
            ]);
            
        }//end of foreach
    }
}
