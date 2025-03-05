<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function viewLogin(): View
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $requestDTO = $request->validated();
        $credentials = [
            'email' => $requestDTO['email'],
            'password' => $requestDTO['password']
        ];

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('admin.dashboard')->with('toastSuccess', 'Successfully Login!');
        }

        return back()->with('toastError', 'Email or Password is wrong!')->withInput();
    }
}
