<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Common\Traits\ApiResponser;
use App\Services\Category\Repository\CategoryRepository;

// all login goes to this file on user

class CategoryServices
{
    use ApiResponser;

    private $repository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function showAll(): JsonResponse
    {
        try {
            $category = $this->repository->findAll();
            return  $this->apiSuccessResponse($category);
        } catch (Exception $err) {
            return $this->apiErrorResponse($err->getMessage());
        }
    }
    // creating a product 
    public function create($request): JsonResponse
    {
        try {
            dd($request);
            $data = $request->validated();
            $category = $this->repository->create($data);
            return $this->apiSuccessResponse($category);
        } catch (Exception $err) {
            return $this->apiErrorResponse($err->getMessage());
        }
    }
    // update method here
    // public function update()

    // public function destroy($id): JsonResponse
    // {
    //     try {
    //         $user = $this->repository->delete($id);
    //         $message = "User successfully deleted";
    //         $data = [
    //             $user,
    //             $message
    //         ];
    //         return $this->apiSuccessResponse($data);
    //     } catch (Exception $err) {
    //         return $this->apiErrorResponse($err->getMessage());
    //     }
    // }
}
