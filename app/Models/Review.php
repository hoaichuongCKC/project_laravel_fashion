<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'star',
        'content',
        'image_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }
}
