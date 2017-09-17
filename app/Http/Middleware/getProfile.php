<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;
use App\User;
class getProfile
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
        $user       = User::where('username', '=', Session::get('username'))->get();
        $profile    = User::find($user[0]['id']);
        $request->session()->put('profile', $profile);
        return $next($request);
    }
}
