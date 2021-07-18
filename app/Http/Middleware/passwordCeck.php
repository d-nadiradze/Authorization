<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use mysql_xdevapi\Statement;

class passwordCeck
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
        $data = $request->user();

        if(!$data->password){
            return response()->view('auth.confirmPassword',['data' => $data]);
        }
        return $next($request);
    }
}
