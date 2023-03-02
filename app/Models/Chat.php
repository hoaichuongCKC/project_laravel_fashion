<?php

namespace App\Models;

use App\Models\RoomChat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_chat_id',
        'message',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function roomChat(){
        return $this->belongsTo(RoomChat::class);
    }
}
