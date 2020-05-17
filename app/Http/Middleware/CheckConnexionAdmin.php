<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckConnexionAdmin
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
        if (Session::has('utilisateur')) {
            if(Session::get('utilisateur')->profil === 'admin'){
                return $next($request); 
            }
            return redirect('/');
        }
        return redirect('connexion');
       
    }
}