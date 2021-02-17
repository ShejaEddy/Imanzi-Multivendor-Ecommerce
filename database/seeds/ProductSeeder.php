<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'id' => 1,
                'title' => 'Shoes',
                'slug' => 'shoes',
                'summary' => 'A really good one',
                'description' => 'lorem ipsum asi',
                'photo' => '/storage/photos/1/4375a4ea-0032-40e1-b447-dacca0f6b75a.jpg',
                'stock' => 3,
                'size' => 'L',
                'condition' => 'new',
                'status'=> 'active',
                'approval_status'=> 'approved',
                'price' => 125000.00,
                'discount' => 10.00,
                'is_featured' => 1,
                'cat_id' => factory(Category::class)->create()->id,
                'child_cat_id' => null,
                'brand_id' => factory(Brand::class)->create()->id,
                'seller_id' => 3,
                "created_at" =>  \Carbon\Carbon::now(), 
                "updated_at" => \Carbon\Carbon::now(),  
            ]
        ];

        DB::table('products')->insert($products);

    }
}
