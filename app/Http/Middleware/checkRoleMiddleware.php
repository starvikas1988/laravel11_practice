<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        $user = User::find(5); // Use find instead of findOrFail (1- no such user exists,5-user,4-admin)

        if (!$user) {
            // If user is not found, redirect with an error
            return redirect()->route('users.index')->with('error', 'Access denied. No such user exists.');
        }
    
        if ($user->role !== 'admin') {
            // If the user's role is not admin, redirect with an error
            return redirect()->route('users.index')->with('error', 'Access denied. You do not have the required permissions.');
        }
    
        // If the user exists and has the admin role, proceed with the request
        return $next($request);
    }

    // public function handle(Request $request, Closure $next, $role): Response
    // {
    //     $role  here will be either admin/user depending on what params we are passing with the middleware ,in this case threw the route file
    //     $user = User::findOrFail($request->id); ?id=1 -- comming from the url
    //     if($user->role == $role) {
    //         return $next($request);
    //     }

    //     return abort(403);
    // }
}
