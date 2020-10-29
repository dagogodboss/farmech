<?php

namespace App\Services\Users\Model;

use App\Services\Users\Traits\UserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    const VERIFIED_USER = 1;
    const UNVERIFIED_USER = 0;
    const BUYER = 0;
    const SELLER = 1;
    const ADMIN = 2;
    const SUPER_ADMIN = 3;

    use HasApiTokens, Notifiable, UserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // note this function will be changed later to hash

    public static function  generateVerificationCode()
    {
        return Str::random(40);
    }

    protected static function boot(){
        parent::boot();
        self::creating(function ($model){
            // $model->assignRole('buyer');
        });
    }
}
