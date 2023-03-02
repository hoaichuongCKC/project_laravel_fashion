<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $image =  Image::create([
            "url" => "user/avatar/avatar.jpg",
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        User::create([
            'username'=>"naninani@1",
            'fullName'=>"Hoài Chương",
            'phone'=> "0918031587",
            'email'=> "nhchuong2001@gmail.com",
            'password' => Hash::make('123456789'),
            'role' => 0,
            "image_id" =>  $image->id,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
    }
}
