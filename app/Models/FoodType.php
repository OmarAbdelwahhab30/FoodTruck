<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at',"updated_at"];

    public function trucks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Truck::class);
    }
}
