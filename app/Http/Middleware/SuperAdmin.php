<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SuperAdmin
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
        Log::info('soy un middleware de super_admin');

        if (auth()->user()->role !== 'super_admin') {
            return response()->json(
                [
                    "success" => false,
                    "message" => "NO PUEDES PASAAAAAR!!!!"

                ],
                403
            );
        }
        return $next($request);
    }
}
