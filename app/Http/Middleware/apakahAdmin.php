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
            return redirect('/')->with('nouser', 'Tidak dapat diakses, Anda harus masuk dahulu!');// maka balik ke halaman login, dan minta masuk dahulu
        }

        if (!auth()->check() || !auth()->user()->status == 1) { //jika dia tidak masuk, dan tidak punya status ==1
            abort(403); //maka abort 403
        }
        return $next($request);
    }
}
