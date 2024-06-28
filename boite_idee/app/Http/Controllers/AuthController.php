<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('Auth.register'); // Retournez la vue d'inscription
    }

    public function postRegister(Request $request)
    {
        // Validez les champs du formulaire
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        // Créez l'utilisateur en définissant le rôle par défaut et en hachant le mot de passe
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('status', 'Inscription réussie! Vous pouvez maintenant vous connecter.');
    }

    public function getLogin()
    {
        return view('Auth.login'); // Retournez la vue de connexion
    }

    public function postLogin(Request $request)
    {
        // Validez les informations d'identification
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Connectez l'utilisateur
        if (Auth::attempt($credentials)) {
            // Regénérer la session pour éviter les attaques de fixation de session
            $request->session()->regenerate();

            // Récupérer l'utilisateur connecté
            $user = Auth::user();
            return redirect()->route('idees.index'); // Redirection après connexion réussie
        }

        // Si l'authentification échoue, redirigez vers la page de connexion avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
