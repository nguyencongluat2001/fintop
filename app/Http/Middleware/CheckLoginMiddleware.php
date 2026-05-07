<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $roles = [
            'ADMIN', 'MANAGE',
            'CV_ADMIN', 'CV_PRO', 'CV_BASIC',
            'SALE_ADMIN', 'SALE_BASIC',
            'CV_ADMIN,SALE_ADMIN',
            'CV_ADMIN,SALE_BASIC',
            'CV_PRO,SALE_ADMIN',
            'CV_PRO,SALE_BASIC',
            'CV_BASIC,SALE_ADMIN',
            'CV_BASIC,SALE_BASIC'
        ];

        // check role trong Auth, KHÔNG dùng $_SESSION
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // logout đúng Laravel
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
