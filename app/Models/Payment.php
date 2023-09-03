<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $hidden = [
        'payment_response',
    ];
    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('h:i:s a m/d/Y');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, "customer_id");
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, "seller_id");
    }
}
