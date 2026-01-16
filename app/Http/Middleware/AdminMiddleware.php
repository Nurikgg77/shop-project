<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, что пользователь авторизован и является админом
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Иначе редирект на главную или выдаём 403
        abort(403, 'У вас нет прав для доступа к этой странице.');
    }
}
