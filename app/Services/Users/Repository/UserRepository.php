<?php

namespace App\Services\Users\Repository;

use Exception;
use App\Services\Users\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Common\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use App\Common\Repository\BaseRepository;
use Carbon\Carbon;


class UserRepository

{


    public function find(string $id)
    {
        return User::where('_id', $id)->first();
    }

    public function findAll()
    {
        return User::all();
    }

    public function create($data)
    {
        return User::create($data);
    }
    public function save($data)
    {
        $user = new User;
        return $user->save($data);
    }
    public function delete(string $id)
    {
        return User::destroy($id);
    }
    public function getBy($field, $param)
    {
        return User::where($field, $param)->first();
    }
}
