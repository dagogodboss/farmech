<?php

namespace App\Services\Product;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Common\Traits\ApiResponser;
use App\Services\Product\Repository\ProductRepository;

// all login goes to this file on user

class ProductServices
{
    use ApiResponser;

    private $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function showAll(): JsonResponse
    {
        try {
            $products = $this->repository->findAll();
            return  $this->apiSuccessResponse($products);
        } catch (Exception $err) {
            return $this->apiErrorResponse($err->getMessage());
        }
    }
    // creating a product
    public function create($request): JsonResponse
    {
        try {
            $data = $request->validated();
            $products = $this->repository->create($data);
            return $this->apiSuccessResponse($products);
        } catch (Exception $err) {
            return $this->apiErrorResponse($err->getMessage());
        }
    }

    public function addImage($request): JsonResponse
    {
        try {
            $product = $this->repository->find($request->product_id);
            $product->update(['image' => $request->image]);
            return $this->apiSuccessResponse($product);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse($th->getMessage());
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
