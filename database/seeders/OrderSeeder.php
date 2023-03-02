<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('orders')->insert([
            'code' => 'HDF'. Str::random(10),
            'user_id' => 1,
            'shipping_name' => 'chuong',
            'shipping_phone' => "0918031587",
            'shipping_address'=> '12 Hồ Thành Biên, P.4, Q.8, TP HCM',
            'payment_method' => "COD",
            'note' => ".....Note",
            'total' => 500000,
            "created_at" => date("Y-m-d H:i:s"),
        ]);
    }
}
