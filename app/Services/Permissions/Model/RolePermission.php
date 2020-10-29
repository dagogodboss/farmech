<?php

namespace App\Services\Permissions\Model;

use App\Services\Role\Model\Role;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id', 'permission_id'];
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }
}
