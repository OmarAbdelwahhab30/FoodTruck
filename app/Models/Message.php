<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    public function getContentAttribute() {
        if ($this->attributes['type'] !== "text"){
            return asset("storage/".$this->attributes['content']);
        }
        return $this->attributes['content'];
    }
    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('h:i a');
    }
    protected $guarded = [];
    protected $hidden = ['updated_at'];

    public function chat(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
