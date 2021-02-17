<?php

use App\SellerOrder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                [
                    'seller_id' => 3,
                    'order_id' => 1,
                    "created_at" =>  \Carbon\Carbon::now(), 
                    "updated_at" => \Carbon\Carbon::now(),  
                ]
            ];

        DB::table('seller_orders')->insert($data);
    }
}
