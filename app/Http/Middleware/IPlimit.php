<?php

namespace App\Http\Middleware;

use Closure;

class IPlimit
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
        //設定するIPアドレス
        $IP='123.198.171.166';
        
        $ip = [['ip'=>$IP]];
        
        $detect = collect($ip)->contains('ip', $request->ip());
        

        if (!$detect) {
            return redirect('invalid');
        }
        
        return $next($request);
    }
       
}

