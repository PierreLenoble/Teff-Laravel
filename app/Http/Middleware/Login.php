<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Login
{
    private $dureeSession = 360000;
    
    public function handle($request, Closure $next) {
        
        if (Session::get('time') == null || Session::get('connected') == null) {
            Session::put('connected', false); 
            Session::put('time', 0); 
        }
        
        if (Session::get('connected')) {
            $diff = time() - Session::get('time');
            if ($diff < $this->dureeSession) {
                Session::put('connected', true); 
                Session::put('time', time()); 
            } else {
                Session::put('connected', false); 
                Session::put('time', 0); 
            }
        }
        
        if (Session::get('connected')) {
            return $next($request);
        }
        
        return redirect()->route('admin_login');
    }
}
