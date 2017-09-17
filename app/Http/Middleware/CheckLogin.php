<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Redirect;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleName)
    {

        if(Session::has('username')) { 

            if($roleName == 0){ 
                if(Session::get('level') == 0) return Redirect::to('/admin');
                if(Session::get('level') == 1) return Redirect::to('/member');
            }

            if($roleName == 1) {
                if(Session::get('level') == 1) return Redirect::to('/member');
            }

            if($roleName == 2) {
                if(Session::get('level') == 0) return Redirect::to('/admin');
            }

        }
        else {

            if($roleName != 0) {
                return Redirect::to('/');
            }

        }
        return $next($request);
    }
}
