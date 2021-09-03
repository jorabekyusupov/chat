<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use function PHPUnit\Framework\returnValue;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';
    protected $fillable = ['user_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
