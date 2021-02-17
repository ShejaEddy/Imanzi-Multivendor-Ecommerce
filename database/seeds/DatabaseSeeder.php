<?php

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
         $this->call(UsersTableSeeder::class);
         $this->call(SettingTableSeeder::class);
         $this->call(BannerSeeder::class);
         $this->call(CouponSeeder::class);
         $this->call(ShippingSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(ProductReviewSeeder::class);
         $this->call(OrderSeeder::class);
         $this->call(CartSeeder::class);
         $this->call(SellerOrderSeeder::class);
    }
}
