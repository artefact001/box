<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authentification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Redirection vers la page de connexion si l'utilisateur n'est pas authentifié
            return redirect()->route('login')->with(' Vous devez être connecté pour accéder à cette page.');
        }

        // Si l'utilisateur est authentifié, permettre la requête de continuer
        return $next($request);
    }
}
