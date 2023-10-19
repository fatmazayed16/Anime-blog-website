<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class check
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
     if(Auth::check()){
        $role = User::where('id',Auth::user()->id)->get() ;
    if($this->d($role,'status') == 'premium')
        return $next($request);
          else 
         return redirect("/");
     }
     else
     return redirect("/");
  
    }
    private function d($s , $a){
        foreach ($s as $x)
        return $x->$a;
    }
}