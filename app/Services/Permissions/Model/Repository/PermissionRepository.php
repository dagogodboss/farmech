<?php

namespace App\Services\Permissions\Repository;

use App\Services\Permissions\Model\Permission;
use App\Services\Permissions\Model\RolePermission;

class PermissionRepository {

    public function fetchAll()
    {
        return Permission::all();
    }

    public function create(Array $data):Permission{
        return Permission::create($data);
    }

    public function find(string $id)
    {
        return Permission::where('_id', $id)->first();
    }

    public function assignPermissionRole(Array $data):RolePermission
    {
        return RolePermission::create($data);
    }
}
