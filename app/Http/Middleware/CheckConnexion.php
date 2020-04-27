<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckConnexion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('utilisateur')) {
            return redirect('connexion');
        }

        return $next($request);
    }
}