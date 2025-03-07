<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Response;
use App\Helpers\Response\ResponseObject;

class UserService
{
    public function createUser(array $userDTO): object
    {
        try {
            $createdUser = User::create($userDTO);

            return ResponseObject::success(
                message: __("crud.created", ['name' => 'User']),
                statusCode: Response::HTTP_CREATED,
                data: $createdUser
            );
        } catch (\Throwable $th) {
            return ResponseObject::error(
                message: __("crud.error_create", ['name' => 'User']),
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR,
                errors: $th->getTrace()
            );
        }
    }
}
