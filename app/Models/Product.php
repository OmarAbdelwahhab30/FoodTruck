<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function truck(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Truck::class);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class);
    }
}
