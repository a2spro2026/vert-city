@php
    $shouldOpenLogin = $errors->any() || session('open_login');
@endphp

<dialog id="admin-login-panel" class="login-panel" @if ($shouldOpenLogin) open @endif>
    <div class="login-panel-card">
        <div class="mb-5 flex items-start justify-between gap-4">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-[#6f8f4f]">Espace administration</p>
                <h2 class="font-display mt-1 text-xl font-semibold text-[#153827]">Connexion</h2>
            </div>
            <button type="button" class="login-panel-close" data-login-close aria-label="Fermer">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-3.5 py-2.5 text-sm text-red-700" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="space-y-3.5">
            @csrf
            <div>
                <label for="panel-role" class="mb-1.5 block text-sm font-semibold text-slate-700">Statut</label>
                <select id="panel-role" name="role" required
                    class="field-glow w-full rounded-xl border border-slate-200 bg-white px-3.5 py-3 text-sm outline-none focus:border-[#70a744]">
                    @foreach (\App\Models\User::ROLES as $value => $label)
                        <option value="{{ $value }}" @selected(old('role', 'manager') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="panel-login" class="mb-1.5 block text-sm font-semibold text-slate-700">Login</label>
                <input id="panel-login" name="login" type="text" value="{{ old('login') }}" required autocomplete="username"
                    class="field-glow w-full rounded-xl border border-slate-200 bg-white px-3.5 py-3 text-sm outline-none focus:border-[#70a744]"
                    placeholder="Votre identifiant">
            </div>
            <div>
                <label for="panel-password" class="mb-1.5 block text-sm font-semibold text-slate-700">Mot de passe</label>
                <input id="panel-password" name="password" type="password" required autocomplete="current-password"
                    class="field-glow w-full rounded-xl border border-slate-200 bg-white px-3.5 py-3 text-sm outline-none focus:border-[#70a744]"
                    placeholder="••••••••">
            </div>
            <label class="flex cursor-pointer items-center gap-2.5 text-sm text-slate-600">
                <input name="remember" type="checkbox" class="h-4 w-4 rounded border-slate-300 accent-[#58883a]">
                Garder ma session ouverte
            </label>
            <button type="submit" class="btn-glow-dark w-full rounded-xl bg-[#153827] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#214f39]">
                Se connecter
            </button>
        </form>
    </div>
</dialog>
