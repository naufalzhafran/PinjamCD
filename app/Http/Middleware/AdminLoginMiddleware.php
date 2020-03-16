<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->input('token')) {
            $check =  User::where('token', $request->input('token'))->first();

            if ($check->role != 'admin') {
                return response('Please use Admin Token', 401);
            } else {
                return $next($request);
            }
        } else {
            return response('Please input your token', 401);
        }
    }
}