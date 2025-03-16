<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthGame
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $userId = 958559997; //$request->userId

        if (!Auth::attempt(['telegram_id' =>  $userId, 'password' => $userId])) {
            return Response([
                'status' => 'error',
                'message' => 'Not authorized',
            ], 401, [
                'Content-Type', 'application/json'
            ]);
        }

        return $next($request);
    }
}
