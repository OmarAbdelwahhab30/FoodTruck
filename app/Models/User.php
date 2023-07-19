<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    protected $fillable = [
        'id',
        'name',
        'phone',
        'password',
        'role_id',
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

    public function contact_us(){
        return $this->hasMany(ContactUs::class);
    }

}
