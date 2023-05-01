<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if(Auth::user()->roles == 0)
        {
            return $next($request);
        }
            return $this->unauthorized();
    }
    private function unauthorized($message = null){
        // return response()->json([
        //     'message' => $message ? $message : 'You are unauthorized to access this resource',
        //     'success' => false
        // ], 401);
        return response(view('errors.403'));
    }
}
