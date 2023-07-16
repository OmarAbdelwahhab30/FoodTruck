<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    //sellers in the truck
    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class);
    }

    public function food_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FoodType::class);
    }

    public function review(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Review::class);
    }
}
