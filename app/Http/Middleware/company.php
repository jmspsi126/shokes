<?php

namespace App\Http\Middleware;

use Closure;

class company
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

        if(!$request->user()->isCompany){

            if($request->user()->isStudent){
                return redirect('profile');
            }

            if($request->user()->isExpertise){
                return redirect('expertise');
            }
        }    

        return $next($request);
    }
}
