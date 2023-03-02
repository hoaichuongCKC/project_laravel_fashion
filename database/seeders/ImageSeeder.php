<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_banner = [
            "banners/banner_3_63fd7e70ae1d6.jpg",
            "banners/banner_63fd7d37aa353.jpg",
            "banners/banner_63fd805a35abc.jpg",
        ];
        foreach ($list_banner as $item) {
            DB::table('images')->insert([
                "url" => $item,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }

        $list_category = [
            "categories/All.png",
            "categories/men.png",
            "categories/woman.png",
            "categories/shoes.png",
            "categories/kids.png",
        ];

        foreach ($list_category as $item) {
            DB::table('images')->insert([
                "url" => $item,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }

        $list_product= [
            "products/ao_ba_lo_do.jpg" => 6,
            "products/ao_ba_lo_xanh.jpg"=> 6,
            "products/ao_cotton_kid.jpg"=> 5,
            "products/ao_phong_unisex_black_white_1.jpg"=> 4,
            "products/ao_phong_unisex_black_white_2.jpg"=> 4,
            "products/ao-polo-nam-aristino-den.png"=> 1,
            "products/ao-polo-nam-Aristino-xam.jpg"=> 1,
            "products/ao-polo-nam-Aristino-xanh.jpg"=> 1,
            "products/dam_han_quoc_den_nau-nhat.jpg"=> 9,
            "products/guoc_banh_mi_nu_1.jpg"=> 2,
            "products/guoc_banh_mi_nu_2.jpg"=> 2,
            "products/guoc_cao_no_black.png"=> 3,
            "products/guoc_cao_no_white.jpg"=> 3,
            "products/hoodie_den.jpg"=>7,
            "products/hoodie_white.jpg"=>7,
            "products/hoodie_xanh.jpg"=>7,
            "products/jean_nam_xanh_1.jpg"=> 10,
            "products/jean_nam_xanh.jpg"=> 10,
            "products/Vay_de_tiec_nau.jpg"=> 8,
            "products/vay_di_tiec_den.jpg"=> 8,
        ];

        foreach ($list_product as $key => $value) {
            $image = Image::create([
                "url" => $key,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }

    }
}
