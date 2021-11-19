<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $sellers  = ['super_admin','selle one','seller tow','seller 3'.'seller 4','seller 5','seller 6']

        // foreach ($sellers as $seller) {
            
            \App\Models\Seller::create([
                'status' => 'true',
                'seller' => '1',
                'name' => 'Seller',
                'user_name' => 'Seller',
                'email' => "super_admin@app.com",
                'phone' => '12312123',
                'country' => 'sudan',
                'work_online_lap' => 'Pc/lap top',
                'make_designs_from_social' => 'make_designs_use',
                'about_yourself' => 'make_designs_use',
                'password' => bcrypt('123123123'),
            ]);

            \App\Models\Seller::create([
                'status' => 'true',
                'seller' => '1',
                'name' => 'Seller1',
                'user_name' => 'Seller1',
                'email' => "admin1@app.com",
                'phone' => '12312123',
                'country' => 'sudan',
                'work_online_lap' => 'Pc/lap top',
                'make_designs_from_social' => 'make_designs_use',
                'about_yourself' => 'make_designs_use',
                'password' => bcrypt('123123123'),
            ]);

            \App\Models\Seller::create([
                'status' => 'true',
                'seller' => '1',
                'name' => 'Seller2',
                'user_name' => 'Seller2',
                'email' => "Seller2@app.com",
                'phone' => '12312123',
                'country' => 'sudan',
                'work_online_lap' => 'Pc/lap top',
                'make_designs_from_social' => 'make_designs_use',
                'about_yourself' => 'make_designs_use',
                'password' => bcrypt('123123123'),
            ]);

            \App\Models\Seller::create([
                'status' => 'true',
                'seller' => '1',
                'name' => 'Seller3',
                'user_name' => 'Seller3',
                'email' => "Seller3@app.com",
                'phone' => '12312123',
                'country' => 'sudan',
                'work_online_lap' => 'Pc/lap top',
                'make_designs_from_social' => 'make_designs_use',
                'about_yourself' => 'make_designs_use',
                'password' => bcrypt('123123123'),
            ]);

            \App\Models\Seller::create([
                'seller' => '1',
                'name' => 'Seller4',
                'user_name' => 'Seller4',
                'email' => "admin4@app.com",
                'phone' => '12312123',
                'country' => 'sudan',
                'work_online_lap' => 'Pc/lap top',
                'make_designs_from_social' => 'make_designs_use',
                'about_yourself' => 'make_designs_use',
                'password' => bcrypt('123123123'),
            ]);

            \App\Models\Seller::create([
                'seller' => '1',
                'name' => 'Seller5',
                'user_name' => 'Seller',
                'email' => "admin5@app.com",
                'phone' => '12312123',
                'country' => 'sudan',
                'work_online_lap' => 'Pc/lap top',
                'make_designs_from_social' => 'make_designs_use',
                'about_yourself' => 'make_designs_use',
                'password' => bcrypt('123123123'),
            ]);

            \App\Models\Seller::create([
                'seller' => '1',
                'name' => 'Seller6',
                'user_name' => 'Seller6',
                'email' => "Seller16@app.com",
                'phone' => '12312123',
                'country' => 'sudan',
                'work_online_lap' => 'Pc/lap top',
                'make_designs_from_social' => 'make_designs_use',
                'about_yourself' => 'make_designs_use',
                'password' => bcrypt('123123123'),
            ]);

            \App\Models\Seller::create([
                'seller' => '1',
                'name' => 'Seller7',
                'user_name' => 'Seller7',
                'email' => "Seller7@app.com",
                'phone' => '12312123',
                'country' => 'sudan',
                'work_online_lap' => 'Pc/lap top',
                'make_designs_from_social' => 'make_designs_use',
                'about_yourself' => 'make_designs_use',
                'password' => bcrypt('123123123'),
            ]);
        // }
    }
}
