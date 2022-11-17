<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class Published
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
        /* valida si el usuario está autenticado */

        if ($request->user()) {

            /* si el usuario autenticado tiene el rol admin lo deja pasar */

            if($request->user()->hasRole('admin')){
                return $next($request);
            }

            /* si el usuario autenticado y el producto tienen relacion entra al if*/

            if ($request->route('product')->user_id == $request->user()->id) {

                /* si el usuario está suscrito lo deja pasar, de lo contrario lo redirige a renovar el plan */
                if ($request->user()->subscribed('Prueba')) {
                    return $next($request);
                }else{
                    return redirect('billing');
                }                
            }

            /* si el usuario esta autenticado pero entra a ver el producto de alguien más, lo puede dejar pasar si ese usuario dueño del producto está al dia, de lo contario lo devuelve return back */

            if (User::where('id',$request->route('product')->user_id)->get()->first()->subscribed('Prueba')) {
                return $next($request);
            }else{
                return back();
            }
        }

        /* si el usuario es invitado, y el usuario dueño del producto no tiene suscripcion return back de lo contrario lo deja pasar */

        if (User::where('id',$request->route('product')->user_id)->get()->first()->subscribed('Prueba')) {
            return $next($request);
        }else{
            return back();
        }
    }
}
