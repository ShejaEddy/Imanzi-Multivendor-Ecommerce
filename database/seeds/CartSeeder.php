<?php

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts = [
            [
                'id' => 1,
                'product_id' => 1,
                'order_id' => 1,
                'user_id' => 2,
                'price' => '10000.00',
                'status' => 'new',
                'quantity' => 2,
                'amount' => '20000.00',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]
        ];
        DB::table('carts')->insert($carts);
    }
}
