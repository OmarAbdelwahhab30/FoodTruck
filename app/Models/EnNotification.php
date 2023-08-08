<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnNotification extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    protected $table = "en_notifications";
}
