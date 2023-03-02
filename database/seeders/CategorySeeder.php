<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counter = 4;

        $list_name = [
            "All","Men","Women","Shoes","Kid"
        ];

        $list_name_vi = [
            "Tất cả","Đàn ông","Phụ nữ","Giày","Trẻ em"
        ];

        for($i = 0; $i < 5; $i++){
            DB::table('categories')->insert([
                "name" => $list_name[$i],
                "name_vi" => $list_name_vi[$i],
                "image_id" => $counter,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
            $counter++;
        }
    }
}
