<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'shipping_name',
        'shipping_phone',
        'shipping_address',
        'payment_method',
        'note',
        'total',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    
    public function notification(){
        return $this->hasOne(Notification::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    protected static function boot(){
        parent::boot();

        static::creating(function ($model){

            $keyName = $model->getKeyName();

            if(empty($model->{$model->getKeyName()}) && $keyName == "code"){
                $model->{$model->getKeyName()} = "KRHDVN". Str::random(5) . date('YmdHis');
            }
          
        });
    }
}
