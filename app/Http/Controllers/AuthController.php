<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(): RedirectResponse
    {
        return redirect()
            ->guest(route('home'))
            ->with('open_login', true);
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'role' => ['required', Rule::in(array_keys(User::ROLES))],
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt([
            'login' => $credentials['login'],
            'password' => $credentials['password'],
        ], $request->boolean('remember'))) {
            return back()
                ->withErrors(['login' => 'Les identifiants saisis sont incorrects.'])
                ->onlyInput('role', 'login')
                ->with('open_login', true);
        }

        if ($request->user()->role !== $credentials['role']) {
            Auth::logout();

            return back()
                ->withErrors(['role' => 'Le statut sélectionné ne correspond pas à ce compte.'])
                ->onlyInput('role', 'login')
                ->with('open_login', true);
        }

        if (! $request->user()->isActive()) {
            Auth::logout();

            return back()
                ->withErrors(['login' => 'Ce compte est inactif. Contactez un administrateur.'])
                ->onlyInput('role', 'login')
                ->with('open_login', true);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
