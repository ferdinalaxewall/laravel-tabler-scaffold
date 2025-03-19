<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;

class AdministratorController extends Controller
{
    public function __construct(
        protected UserService $userService
    ) {}

    public function index(): View
    {
        $data = User::latest()->get();
        return view('admin.pages.users.administrator.index', compact('data'));
    }

    public function list()
    {

    }

    public function create()
    {
        $data = [
            'page_name' => 'Add Administrator',
            'method' => 'POST',
            'action' => route('admin.users.administrator.store')
        ];

        $user = new User;

        return view('admin.pages.users.administrator.form', compact('data', 'user'));
    }

    public function store(CreateUserRequest $request)
    {
        $requestDTO = $request->validated();
        $createUserResponse = $this->userService->createUser($requestDTO);

        return $createUserResponse->success
            ? to_route('admin.users.administrator.index')->with('toastSuccess', $createUserResponse->message)
            : back()->with('toastError', $createUserResponse->message)->withInput();
    }

    public function edit(string $id)
    {
        $data = [
            'page_name' => 'Edit Administrator',
            'method' => 'PUT',
            'action' => route('admin.users.administrator.update', $id)
        ];

        $getUserResponse  = $this->userService->getUserById($id);
        return $getUserResponse->success
            ? view('admin.pages.users.administrator.form', [
                'data' => $data,
                'user' => $getUserResponse->data
            ]) : to_route('admin.users.administrator.index')->with('toastError', $getUserResponse->message);
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $requestDTO = $request->validated();
        $updateUserResponse = $this->userService->updateUser($requestDTO, $id);

        return $updateUserResponse->success
            ? to_route('admin.users.administrator.index')->with('toastSuccess', $updateUserResponse->message)
            : back()->with('toastError', $updateUserResponse->message)->withInput();
    }

    public function delete(string $id)
    {
        $deleteUserResponse = $this->userService->deleteUser($id);

        return to_route('admin.users.administrator.index')->with(
            $deleteUserResponse ? 'toastSuccess' : 'toastError',
            $deleteUserResponse->message
        );
    }
}
