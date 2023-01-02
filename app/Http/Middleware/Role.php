<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // ...$roles -> untuk mengubah data string yang dikirimnke middleware menjadi bentuk array
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // cek apakaj di dalam array $role (parameter) yang dikirim dari route tadi terdapat
        //
        if (in_array(Auth::user()->role,$roles)) {
        return $next($request);
        }
        return redirect('/error');
    }
}
