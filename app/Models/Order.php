<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected $hidden = [
        'create_at',
        'updated_id',
        ];
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class,"order_product",'order_id','product_id')
            ->withPivot('optional');
    }

    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('h:i:s a m/d/Y');
    }
}
