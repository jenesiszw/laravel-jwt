<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;


class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(["data" => [], "message" => "Token is Invalid", 'status' => 'error'], 401);
            } else if ($e instanceof TokenExpiredException) {
                return response()->json(["data" => [], "message" => "Token Expired", 'status' => 'error'], 401);
            } else {
                return response()->json(["data" => [], "message" => "Authorization Token Not Found", 'status' => 'error'], 401);
            }
        }
        return $next($request);
    }
}