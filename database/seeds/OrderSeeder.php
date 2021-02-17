<?php

use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'id' => 1,
                'order_number' => 'ORD-XPH00',
                'user_id' => 2,
                'sub_total' => 10000.00,
                'shipping_amount' => 0.00,
                'coupon' => NULL,
                'total_amount' => 130000.00,
                'quantity' => 2,
                'payment_method' => 'cod',
                'payment_status' => 'unpaid',
                'status' => 'new',
                'first_name' => 'Jean',
                'last_name' => 'Emmery',
                'email' => 'emmery@gmail.com',
                'phone' => '250784141587',
                'country' => 'Rwanda',
                'post_code' => '1234',
                'address1' => 'Remera corner',
                'address2' => 'Gishushu',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]
        ];

        DB::table('orders')->insert($orders);
    }
}
