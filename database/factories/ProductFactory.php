<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // "barner_code" => "PROF". Str::random(5) . date('Ymd'),
            // "name" => "Áo polo nam Aristino",
            // "price" => range(100000,600000),
            // "stock" => random_int(10,60),
            // "description" => fake('vi_VN')->text(),
            // "properties" => [
            //     "sizes" => ["M","L","XL"][rand(0,3)],
            //     "origin" => ["China","Japan","France"][rand(0,3)],
            //     "colors" => ["Red","Yellow","Black"][rand(0,3)],
            // ],
            // "category_id" => 2,
            // "created_at" => date("Y-m-d H:i:s"),
            // "updated_at" => date("Y-m-d H:i:s"),
        ];
    }
}
