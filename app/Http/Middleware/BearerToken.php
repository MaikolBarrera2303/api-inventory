<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class BearerToken
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return false|mixed|string
     */
    public function handle(Request $request, Closure $next): mixed
    {
        try {
            if ($request->hasHeader("Authorization") && $request->header("Authorization") == "Bearer ".env("TOKEN_BACKEND"))
                return $next($request);
            else
                throw new UnauthorizedHttpException('Bearer', 'Unauthorized');

        } catch (UnauthorizedHttpException) {
            return response()->json([
                'code' => 401,
                'message' => 'Token Unauthorized'
            ], 401);
        }
    }
}
