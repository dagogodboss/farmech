<?php

namespace App\Services\Role\Repository;

use App\Services\Role\Model\Role;

class RoleRepository {

    public function findWhere(String $field, String $role )
    {
        $role = Role::where($field, $role)->first();
        return ($role !== null) ? $role : null;
    }

}
