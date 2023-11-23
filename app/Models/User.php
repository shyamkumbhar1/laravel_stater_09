<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Country;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, Billable;


    protected $fillable = [
        'name',
        'is_admin',
        'professional_title',
        'email',
        'password',
        'status'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
}
