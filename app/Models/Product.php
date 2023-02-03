<?php

namespace App\Models;

use App\Models\Review;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'barnes_code',
        'name',
        'price',
        'stock',
        'sizes',
        'colors',
        'image_id',
        'category_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    
    /**
     * > When creating a new model, if the field is empty, set it to a random string
     */
    protected static function boot(){
        parent::boot();

        static::creating(function ($model){
            if(empty($model->{$model->getKeyName()})){
                $model->{$model->getKeyName()} = "PROF". Str::random(10) . date('YmdHis');
            }
        });
    }

    //relationship model
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function review(){
        return $this->hasOne(Review::class);
    }
}
