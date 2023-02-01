<?php

namespace App\Http\Controllers;

use App\Auth\Login;
use App\Auth\Logout;
use App\Auth\Refresh;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return Login::make()->run($request);
    }

    public function logout(Request $request)
    {
        return Logout::make()->run($request);
    }

    public function refresh()
    {
        return Refresh::make()->run();
    }
}