<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at','updated_at','truck_id'];

    protected $table = 'sections';


    public function truck(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Truck::class);
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Product::class,Truck::class);
    }
}
