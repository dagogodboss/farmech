<?php

namespace App\Services\Role;

use App\Common\Traits\ApiResponser;
use App\Services\Role\Repository\RoleRepository;

class RoleServices{
    use ApiResponser;

    private $repository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }

    public function getRole(String $role){
        return $this->repository->findWhere('title', $role);
    }
}
