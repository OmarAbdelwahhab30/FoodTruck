<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;
    protected $fillable = ['owner_percentage','kilo_price','vat'];

    public $timestamps = false;

}
