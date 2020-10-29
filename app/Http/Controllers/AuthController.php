<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Common\Traits\ApiResponser;

class AuthController extends Controller
{
    use ApiResponser;

    // public function login(Request $request): JsonResponse
    // {
    //     try {
    //         $request->validate([
    //             "email" => "email|required",
    //             "password" => "required"
    //         ]);
    //         $user = User::where('email', $request->email)->first();
    //         if (!$user || !Hash::check($request->password, $user->password)) {
    //             return response([
    //                 'message' => ['These credentials do not match our records.']
    //             ], 404);
    //         };
    //         $tokenResult = $user->createToken("authToken")->plainTextToken;
    //         return $this->apiSuccessResponse($tokenResult);
    //     } catch (Exception $err) {
    //         return $this->apiErrorResponse($err->getMessage());
    //     }
    // }
}
