<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StatutUser
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
    if ($user->statut == 'Inactif') {
      Auth::logout();
     return redirect()->route('login')->with('error','Votre compte est désactivé ! Contactez votre administrateur');
    }
    return $next($request);
  }
}
