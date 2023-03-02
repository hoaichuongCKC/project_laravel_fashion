<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Review;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'barner_code',
        'name',
        'price',
        'stock',
        'description',
        'properties',
        'category_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'properties' => 'array',
    ];

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        if (in_array($key, $this->getCasts()) && is_string($value)) {
            $value = json_decode($value, true);
        }

        return $value;
    }
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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }

    //relationship model
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function review(){
        return $this->hasOne(Review::class);
    }

    public function productDetail(){
        return $this->hasMany(ProductDetail::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
