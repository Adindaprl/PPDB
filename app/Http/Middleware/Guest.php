<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {
            if(Auth::user()->role == 'user'){
                return redirect()->route('dashboard')->with('notAllowed', 'Anda sudah login!');
            }else{
                return redirect('/admin/dashborad')->with('notAllowed', 'Anda sudah login!');
            }
            //kalau gak ada history login bakal dikembalikan ke halaman login dengan pesan error
           }
           return $next($request);
        }
}
