<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Modules\System\Dashboard\PermissionLogin\Models\PermissionLoginModel;

class PermissionCheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::check() && (isset($_SESSION["role"]) && ($_SESSION["role"] == 'ADMIN' || $_SESSION["role"] == 'USERS'))){
        if(Auth::check() && (isset($_SESSION["role"]))){
            $PermissionLogin = PermissionLoginModel::where('email',$_SESSION["email"])->first();
            if(isset($PermissionLogin) && (isset($_SESSION['token']) && $_SESSION['token'] == $PermissionLogin->token)){
                return $next($request);
            }
        }
        // Auth::logout();
        // if (!empty($_SESSION['id'])) {
        //     session_destroy();
        // }
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return $next($request);
    }
}
