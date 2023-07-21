<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatFile extends Model
{
    use HasFactory;

    protected $table = 'chat_files';
    protected $guarded = [] ;


    public function chat(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }
}
