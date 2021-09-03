<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messagies';
    protected $fillable = ['text', 'file', 'chat_id', 'user_id', 'chat_detail_id'];


}
