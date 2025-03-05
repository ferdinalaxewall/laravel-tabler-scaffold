<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function processLogout(): RedirectResponse
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return to_route('auth.logout')->with('toastError', 'Successfully Logout!');
    }
}
