<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function chat(){
        return $this->hasMany(Chat::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
