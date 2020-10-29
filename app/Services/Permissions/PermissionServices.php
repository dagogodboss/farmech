<?php

namespace App\Services\Permissions;

use Exception;
use Illuminate\Http\JsonResponse;
use App\Common\Traits\ApiResponser;
use App\Services\Permissions\Repository\PermissionRepository;

class PermissionServices{
    use ApiResponser;

    private $repository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->repository = $permissionRepository;
    }

    public function AssignPermissionRole($request):JsonResponse
    {
        try {
            //code...
            $permission_role = $this->repository->assignPermissionRole($request->all());
            return $this->apiSuccessResponse($permission_role);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->apiErrorResponse($th->getMessage());
        }   
    }

    public function getAll($request):JsonResponse
    {
        try {
            $permissions = $this->repository->fetchAll();
            return  $this->apiSuccessResponse($permissions);
        } catch (Exception $err) {
            return $this->apiErrorResponse($err->getMessage());
        }
        # code...
    }

    public function create($request):JsonResponse{
        try {
            $permission = $this->repository->create($request->all());
            return $this->apiSuccessResponse($permission);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse($th->getMessage());
        }
    }

    public function getById($uuid):JsonResponse{
        try {
            return $this->apiSuccessResponse($this->repository->find($uuid));
        } catch (\Throwable $th) {
            return $this->apiErrorResponse($th->getMessage());
        }
    }

}
