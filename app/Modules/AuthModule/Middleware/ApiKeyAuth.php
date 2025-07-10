<?php

namespace App\Modules\AuthModule\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Modules\AuthModule\Models\ApiKey;

class ApiKeyAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Missing API key.'], 401);
        }

        $apiKey = ApiKey::where('key', $token)->where('active', true)->first();

        if (!$apiKey) {
            return response()->json(['message' => 'Invalid API key.'], 401);
        }

        auth()->login($apiKey->user);

        return $next($request);
    }
}
