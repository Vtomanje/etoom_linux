<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsSubscribePremium
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
        /* si el usuario es el admin puede ver la vista solicitada */
        if ($request->user()) {
            if($request->user()->hasRole('admin')){
                return $next($request);
            }
        }    
    
        /* si el usuario está suscrito puede ver la vista solicitada, de lo contrario lo redirige a billing */

        if ($request->user() && ! $request->user()->subscribed('Prueba premium')) {
            // This user is not a paying customer...
            return redirect('billing-premium');
        }

        return $next($request);
    }
}
