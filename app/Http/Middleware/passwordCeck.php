<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use mysql_xdevapi\Statement;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class passwordCeck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $data = $request->user();

        if(!$data->password){
            return response()->view('auth.confirmPassword',['data' => $data]);
        }
        return $next($request);
    }
}
