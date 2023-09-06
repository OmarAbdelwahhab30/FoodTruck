<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "logo";

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function getLogoAttribute() {
        return asset("storage/".$this->attributes['logo']);
    }
}
