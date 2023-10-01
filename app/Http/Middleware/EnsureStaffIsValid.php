<?php

namespace App\Http\Middleware;

use App\Models\Staff;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureStaffIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->profile_type == Staff::class) {
            return $next($request);
        } else {
            auth()->user()->tokens()->delete();

            return response()->json([
                'message' => 'The account login in the system is failed!'
            ]);
        }
    }
}
