<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_product= [
            9 => 6,
            10=> 6,
            11=> 5,
            12=> 4,
            13=> 4,
            14=> 1,
            15=> 1,
            16=> 1,
            17=> 9,
            18=> 2,
            19=> 2,
            20=> 3,
            21=> 3,
            22=>7,
            23=>7,
            24=>7,
            25=> 10,
            26=> 10,
            27=> 8,
            28=> 8,
        ];

        foreach ($list_product as $key => $value) {
            DB::table('product_details')->insert([
                "product_id" =>  $value,
                "image_id" => $key,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
