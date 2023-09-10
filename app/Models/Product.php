<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
        "section_id",
    ];
    protected $casts = [
        'latitude' => 'decimal:6',
        'longitude' => 'decimal:6'
    ];


    public function truck(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Truck::class);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Order::class,'order_product','product_id','order_id');
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function Carts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Cart::class,"cart_product","product_id","cart_id");
    }

    public function section(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function sizes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Size::class);
    }

    public function optionals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Optional::class);
    }

    public function orderProduct(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }
}
