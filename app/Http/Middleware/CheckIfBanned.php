<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est connecté et banni
        if (Auth::check() && Auth::user()->is_banned) {
            // Déconnecter l'utilisateur
            Auth::guard('web')->logout();

            // Rediriger avec un message d'erreur
            return redirect()->route('login')->withErrors([
                'message' => 'Your account has been banned. Please contact support.'
            ]);
        }

        return $next($request);
    }
}
