<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function __construct(
        protected UserService $userService
    ) {}

    public function viewRegister(): View
    {
        return view('auth.register');
    }

    public function storeRegister(RegisterRequest $request): RedirectResponse
    {
        $requestDTO = $request->validated();
        $createUserResponse = $this->userService->createUser($requestDTO);

        return $createUserResponse->success
            ? to_route('auth.login')->with('toastSuccess', "Successfully registered new account!")
            : back()->with('toastError', "Failed to register new account!")->withInput();
    }
}
