<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_key_word = [
            "ao_thun_giam_50%",
            "ao_polo_giam_50%",
            "giay_nike_giam_50%",
        ];


        foreach($list_key_word as $index => $item){
            DB::table('banners')->insert([
                "key_word" => $item,
                "image_id" => $index+1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
