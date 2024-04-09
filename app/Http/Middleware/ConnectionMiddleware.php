<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConnectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $country = request()->header('x-country');

        if($country == 'US'){
            config(['database.default' => 'pgsql_us']);
            // request()->headers->set('database_connection', 'DB_DATABASE_US');
        }
        else if($country == 'RU'){
            config(['database.default' => 'pgsql_ru']);
            // request()->headers->set('database_connection', 'DB_DATABASE_RU');
        }
        return $next($request);
    }
}
