<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!empty(Auth::user())){
            if(url()->current() == route('mainPage') || url()->current() == route('main#aboutPage')){
                return back();
            }elseif(url()->current() == route('main#blogPage') || url()->current() == route('main#scholarshipPage')){
                return back();
            }elseif(url()->current() == route('main#contactPage') || url()->current() == route('main#createMessage')){
                return back();
            }
            return $next($request);
        }
        return $next($request);
    }
}
