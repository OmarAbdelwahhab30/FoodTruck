<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'password',
        'role_id',
        'email',
        'image',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('h:i:s a m/d/Y');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function truck(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Truck::class);
    }

    public function contact_us(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ContactUs::class);
    }
    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function chat(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Chat::class);
    }

    public function scopeWithinRadius($query, $latitude, $longitude, $radius)
    {
        return $query->select("id", "phone", "latitude", "longitude")
            ->selectRaw("FORMAT(6371 * acos(
                cos(radians(?))
                * cos(radians(latitude))
                * cos(radians(longitude) - radians(?))
                + sin(radians(?))
                * sin(radians(latitude))
            ), 3) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->where("role_id", 2);
    }

    public function cart(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Cart::class);
    }

}
