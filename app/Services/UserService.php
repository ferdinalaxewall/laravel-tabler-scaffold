<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Response\ResponseObject;

class UserService
{
    public function getUsers(array $filters = [])
    {
        return User::latest()->get();
    }

    public function getUserById(string $id)
    {
        $data = User::where('id', $id)->first();
        return !is_null($data)
            ? ResponseObject::success(__('crud.fetched', ['name' => 'User']), Response::HTTP_OK, $data)
            : ResponseObject::error(__('crud.not_found', ['name' => 'User']), Response::HTTP_NOT_FOUND);
    }

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

    public function updateUser(array $userDTO, string $id)
    {
        $getUserResponse = $this->getUserById($id);
        if (!$getUserResponse->success) return $getUserResponse;

        try {
            unset($userDTO['password_confirmation']);
            $userDTO['password'] = !empty($userDTO['password'])
                ? Hash::make($userDTO['password'])
                : $getUserResponse->data->password;

            $getUserResponse->data->update($userDTO);

            return ResponseObject::success(
                message: __("crud.updated", ['name' => 'User']),
                statusCode: Response::HTTP_CREATED,
                data: $getUserResponse->data
            );
        } catch (\Throwable $th) {
            return ResponseObject::error(
                message: __("crud.error_update", ['name' => 'User']),
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR,
                errors: $th->getTrace()
            );
        }
    }

    public function deleteUser(string $id)
    {
        $getUserResponse = $this->getUserById($id);
        if (!$getUserResponse->success) return $getUserResponse;

        try {
            $getUserResponse->data->delete();

            return ResponseObject::success(
                message: __("crud.deleted", ['name' => 'User']),
                statusCode: Response::HTTP_CREATED,
                data: null
            );
        } catch (\Throwable $th) {
            return ResponseObject::error(
                message: __("crud.error_delete", ['name' => 'User']),
                statusCode: Response::HTTP_INTERNAL_SERVER_ERROR,
                errors: $th->getTrace()
            );
        }
    }
}
