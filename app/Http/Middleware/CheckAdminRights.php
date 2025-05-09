<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->user());
        $user = $request->user();
        // dd($user->user_role === "admin");
        if ($user->user_role === "admin") {
            return $next($request);
        }

        return redirect()->route('dashboard')->with('error', 'You do not have admin rights.');
    }
}
