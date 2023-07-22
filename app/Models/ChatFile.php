<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatFile extends Model
{
    use HasFactory;

    protected $table = 'chat_files';
    protected $guarded = [] ;


    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('h:i:s a m/d/Y');
    }
    public function chat(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }
}
