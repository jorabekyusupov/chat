<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat_detail extends Model
{
    use HasFactory;
    protected $table = 'chat_details';
    protected $fillable = ['fromto', 'chat_id'];
    public function user()
    {

        return $this->belongsTo(User::class, 'fromto', 'id');
    }
    public function chats()
    {

        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }
   
}
