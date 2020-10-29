<?php

namespace App\Services\Users\Controllers;

use App\Common\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Users\UsersServices;
use App\Http\Requests\CreateUser;

class AuthController extends Controller
{
    use ApiResponser;
    protected $userServices;

    public function __construct(UsersServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function login(LoginRequest $request)
    {
        return  $this->userServices->login($request);
    }

    public function register(CreateUser $request)
    {
        return $this->userServices->register($request);
    }
}
