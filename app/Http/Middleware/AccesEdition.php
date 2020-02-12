<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccesEdition
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
        $user = Auth::user();

        if($user->edition == false && $user->role != 'Administrateur') {
            return redirect()->route('utilisateur.user_error')->with('error', 'Accès restreint');
        }

        return $next($request);
    }
}
