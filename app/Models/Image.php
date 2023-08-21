<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
            'created_at',
            'updated_at',
            'product_id'
        ];

    public function getImageAttribute() {
        return asset("storage/".$this->attributes['image']);
    }

    public function Product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
