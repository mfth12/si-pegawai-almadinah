<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class apakahAdmin
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
        if (!auth()->check()) {
            abort(redirect('/')->with('nouser', 'Akses terlarang, pastikan masuk menggunakan ID Anda !')); // maka balik ke halaman login, dan minta masuk dahulu
        }
        return $next($request);

        if (!auth()->user()->status == 1) { //jika dia tidak masuk, dan tidak punya status ==1 satu
            abort(403); //maka abort 403
        }
        return $next($request);
    }
}
