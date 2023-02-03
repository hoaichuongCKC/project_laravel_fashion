<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function category(){
        return $this->hasOne(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
