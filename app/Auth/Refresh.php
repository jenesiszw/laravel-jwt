<?php

namespace App\Auth;

use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class Refresh
{
    use AsAction;

    public function handle()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => JWTAuth::refresh(),
                'type' => 'bearer',
            ]
        ], 201);
    }
}