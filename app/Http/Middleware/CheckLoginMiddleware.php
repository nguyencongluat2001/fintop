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
        if(Auth::check() && !empty($_SESSION["role"]) && ($_SESSION["role"] == 'ADMIN' || $_SESSION["role"] == 'MANAGE' || 
        $_SESSION["role"] == 'CV_ADMIN' || $_SESSION["role"] == 'CV_PRO' || $_SESSION["role"] == 'CV_BASIC' || $_SESSION["role"] == 'SALE_ADMIN' || $_SESSION["role"] == 'SALE_BASIC'
             || $_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_BASIC' 
             || $_SESSION['role'] == 'CV_PRO,SALE_ADMIN' || $_SESSION['role'] == 'CV_PRO,SALE_BASIC'
             || $_SESSION['role'] == 'CV_BASIC,SALE_ADMIN'|| $_SESSION['role'] == 'CV_BASIC,SALE_BASIC')){
            return $next($request);
        };
        // Auth::logout();
        if (!empty($_SESSION['id'])) {
            session_destroy();
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
