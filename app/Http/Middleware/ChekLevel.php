<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     foreach ($roles as $role) {
    //         if ($request->user()->level == $role) {
    //           return $next($request);
    //         }
    //     }
    //  return redirect()->route('admin')->withError('Akses Dilarang');

    // }
}
