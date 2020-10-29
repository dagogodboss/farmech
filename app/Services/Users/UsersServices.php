<?php

namespace App\Services\Users;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Common\Traits\ApiResponser;
use App\Services\Role\Model\UserRole;
use App\Services\Role\RoleServices;
use App\Services\Users\Repository\UserRepository;

// all login goes to this file on user

class UsersServices
{
    use ApiResponser;

    private $repository;

    public function __construct(RoleServices $roleServices, UserRepository $userRepository)
    {
        $this->repository = $userRepository;
        $this->roleService = $roleServices;
    }

    public function login($request): JsonResponse
    {
        try {
            $user = $this->repository->getBy('email', $request->email);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return $this->apiErrorResponse(
                    'These credentials do not match our records'
                );
            };
            $tokenResult = $user->createToken("authToken")->plainTextToken;
            $result = [
                $user,
                $user->roles->load('permissions'),
                'token' => $tokenResult
            ];
            return $this->apiSuccessResponse($result);
        } catch (Exception $err) {
            return $this->apiErrorResponse($err->getMessage());
        }
    }

    public function register($request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($request->password);
            $user = $this->repository->create($data);
            $this->assignRole('buyer', $user);
            return $this->apiSuccessResponse($user);
        } catch (Exception $err) {
            return $this->apiErrorResponse($err->getMessage());
        }
    }

    public function resendVerificationCode($user)
    {

        if ($user->isVerified()) {
            return $this->apiErrorResponse('The user is already verified', null, 409);
        }
        // using retry function to resend the email if failed making it failing prone
        retry(5, function () use ($user) {
            // send Mail
            // Mail::to($user)->send(new UserCreated($user));
        }, 100);
        return $this->apiSuccessResponse('A verification mail has been send to your registered email.');
    }

    public function destroy($id): JsonResponse
    {
        try {
            $user = $this->repository->delete($id);
            $message = "User successfully deleted";
            $data = [
                $user,
                $message
            ];
            return $this->apiSuccessResponse($data);
        } catch (Exception $err) {
            return $this->apiErrorResponse($err->getMessage());
        }
    }

    public function assignRole($roles, $user){
        if (is_array($roles)) {
            foreach($roles as $role){
                $roleInstance = $this->roleService->getRole($role);
                if($roleInstance !== null){
                    UserRole::create([
                        'user_id' => $user->id,
                        'role_id' => $role->id
                    ]);
                }
            }
        }
        $role = $this->roleService->getRole($roles);
        if($role !== null){
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $role->id
            ]);
        }
    }
}
