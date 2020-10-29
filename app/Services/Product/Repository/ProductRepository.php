<?php

namespace App\Services\Product\Repository;

use Exception;
use App\Services\Product\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Common\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use App\Common\Repository\BaseRepository;
use Carbon\Carbon;


class ProductRepository

{


    public function find(string $id)
    {
        return Product::where('_id', $id)->first();
    }

    public function findAll()
    {
        return Product::all();
    }

    public function create($data)
    {
        return Product::create($data);
    }
    public function save($data)
    {
        $ModelProduct = new Product;
        return $ModelProduct->save($data);
    }
    public function delete(string $id)
    {
        return Product::destroy($id);
    }
    public function getBy($field, $param)
    {
        return Product::where($field, $param)->first();
    }
}
