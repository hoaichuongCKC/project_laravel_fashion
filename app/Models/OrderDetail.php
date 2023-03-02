<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'size',
        'color',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    
    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }
}
