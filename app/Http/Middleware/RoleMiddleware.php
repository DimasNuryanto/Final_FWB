<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Cek apakah user aktif
        if ($user->status !== 'active') {
            Auth::logout(); // logout user jika status tidak aktif
            return redirect()->route('login')->withErrors([
                'status' => 'Akun Anda belum aktif. Silakan hubungi admin.',
            ]);
        }

        // Cek apakah role sesuai
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        abort(403, 'Akses ditolak.');
    }
}
