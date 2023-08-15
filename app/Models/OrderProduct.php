<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    protected $table = "order_product";

//    protected $hidden = [
//        "id",
//        "order_id",
//        "product_id",
//        "size_id",
//        "optional",
//        "count",
//    ];


    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
