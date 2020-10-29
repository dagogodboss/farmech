<?php

namespace App\Services\Role\Model;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'role_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_roles', 'user_id', 'role_id');
    }
}
