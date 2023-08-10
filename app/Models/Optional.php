<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('h:i:s a m/d/Y');
    }
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
