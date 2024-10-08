<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          $age = $request->query('age');

          if(is_null($age)|| $age < 18){
            return redirect('/')
            ->with('message', 'ban chua du 18 tuoi.');

          }

        return $next($request);

    }
}
