<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class NhanVienLoginMiddleware
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
            if($user->Quyen == 1){
                return $next($request);
            }
            else{
                return redirect('nhanvien/dangnhap');
            }
        }
        else{
            return redirect('nhanvien/dangnhap');
        }
    }
}
