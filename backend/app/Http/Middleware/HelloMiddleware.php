<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = [
            ['name' => 'taro', 'mail' => 'taro@yamada'],
            ['name' => 'hanako', 'mail' => 'hanako@flower'],
            ['name' => 'mai', 'mail' => 'mai@mai'],
        ];

        $request->merge(['data'=> $data]);

        $response =  $next($request);
        return $response;
    }
}
