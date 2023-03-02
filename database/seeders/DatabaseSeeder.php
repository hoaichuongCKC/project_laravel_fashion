<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ImageSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\ProductDetail;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\OrderDetailSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ImageSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductDetailSeeder::class);
        // $this->call(OrderDetailSeeder::class);
    }
}
