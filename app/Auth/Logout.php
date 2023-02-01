<?php

namespace App\Auth;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class Logout
{
    use AsAction;

    public function handle(Request $request)
    {
        try {
            $request->header('Authorization');

            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json(["message" => "Successfully logged out", 'status' => 'success'], 201);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Error occurred", 'status' => 'error'], 200);
        }
    }
}