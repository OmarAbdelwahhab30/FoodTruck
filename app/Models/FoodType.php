<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    use HasFactory;

    protected $table = 'food_types';


    public function trucks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Truck::class);
    }
}
