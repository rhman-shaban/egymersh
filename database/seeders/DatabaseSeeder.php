<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductColorTableSeeder::class);
        $this->call(ProductSizeTableSeeder::class);
        $this->call(SellerTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        $this->call(CouponTableSeeder::class);
        $this->call(OfferTableSeeder::class);
        $this->call(ProductSellerTableSeeder::class);
        $this->call(SellerProductColorTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
