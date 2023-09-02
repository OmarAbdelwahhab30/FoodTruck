<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Notification extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "users_notifications";

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('D, d M  H:i a');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
