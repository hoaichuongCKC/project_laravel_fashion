<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Review;
use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function category(){
        return $this->hasOne(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function banners(){
        return $this->hasOne(Banner::class);
    }

    public function productDetail(){
        return $this->hasOne(ProductDetail::class);
    }
}
