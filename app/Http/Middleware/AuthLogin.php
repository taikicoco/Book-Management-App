<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;//ログインユーザー取得


class AuthLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $Auth = Auth::user();
        if(filled($Auth))
        {
            //return $Auth;
            session(['admin'=>$Auth]);
            return $next($request,$Auth);
        }
        else
        {
            return redirect('/login');
        }
        
        
    }
}
