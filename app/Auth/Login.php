<?php

namespace App\Auth;

use Illuminate\Http\Request;
use App\Util\Actions\Response;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;

class Login
{
    use AsAction;

    /**
     * Login function
     *
     * @param Request $request
     * @return void
     */
    public function handle(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(["data" => [], "message" => "Invalid credentials", 'status' => 'error'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(["data" => [], "message" => "Could not create token", 'status' => 'error'], 500);
        }

        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'data' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }
}