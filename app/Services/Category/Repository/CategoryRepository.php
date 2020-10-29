<?php

namespace App\Services\Category\Repository;

use Exception;

use App\Services\Category\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Common\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;


class CategoryRepository

{

    public function find(string $id)
    {
        return Category::where('_id', $id)->first();
    }

    public function findAll()
    {
        return Category::all();
    }

    public function create($data)
    {
        return Category::create($data);
    }
    public function save($data)
    {
        $ModelCategory = new Category;
        return $ModelCategory->save($data);
    }
    public function delete(string $id)
    {
        return Category::destroy($id);
    }
    public function getBy($field, $param)
    {
        return Category::where($field, $param)->first();
    }
}
