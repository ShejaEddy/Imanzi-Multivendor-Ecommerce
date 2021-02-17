<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'id' => 1,
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'admin',
                'status'=>'active',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(), 
            ),
            array(
                'id' => 2,
                'name'=>'Client',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'user',
                'status'=>'active',
                "created_at" =>  \Carbon\Carbon::now(), 
                "updated_at" => \Carbon\Carbon::now(),  
            ),
            array(
                'id' => 3,
                'name'=>'Seller',
                'email'=>'seller@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'seller',
                'status'=>'active',
                "created_at" =>  \Carbon\Carbon::now(), 
                "updated_at" => \Carbon\Carbon::now(),  
            ),
        );

        DB::table('users')->insert($data);
    }
}
