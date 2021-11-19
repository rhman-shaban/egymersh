<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'super_admin@app.com',
            'admin_id' => '1',
            'password' => bcrypt('123123123'),
        ]);
    }//end of run
    
}//end of class
