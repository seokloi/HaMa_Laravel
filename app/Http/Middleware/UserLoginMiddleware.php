<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class UserLoginMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->Quyen == 0){
                return $next($request);
            }
            else{
				Auth::logout();
                return redirect('login');
            }
        }
        else{
			Auth::logout();
            return redirect('login');
        }
    }
}
