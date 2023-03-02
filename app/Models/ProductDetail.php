<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
