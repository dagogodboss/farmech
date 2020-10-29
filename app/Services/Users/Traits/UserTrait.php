<?php
namespace App\Services\Users\Traits;

use App\Services\Permissions\Model\Permission;
use App\Services\Role\Model\Role;

/**
 *
 */
trait UserTrait
{

    public function hasRole( ... $roles ) {
        foreach ($roles as $role) {
          if ($this->roles->contains('title', $role)) {
            return true;
          }
        }
        return false;
    }

    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role){
          if($this->roles->contains($role)) {
            return true;
          }
        }
        return false;
    }

    public function assignRole($roles){
        if (is_array($roles)) {
            foreach($roles as $role){
                $role = $this->roleService->getRole($role);
                $this->role->create([
                    'role_id' => $role->id
                ]);
            }
        }
        $role = $this->roleService->getRole($role);
        $this->role->create([
            'role_id' => $role->id
        ]);
    }

    public function roles() {
        return $this->belongsToMany(Role::class,'user_roles');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class,'role_permissions');
    }

    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('title', $permission->title)->count();
    }
}
