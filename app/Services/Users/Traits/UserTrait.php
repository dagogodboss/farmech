<?php
namespace App\Services\Users\Traits;
/**
 *
 */
trait UserTrait
{

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
}
