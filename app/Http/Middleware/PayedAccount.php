<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class PayedAccount
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(Auth::guard('web')->user()->status != User::STATUS_ACTIVATED and Auth::guard('web')->user()->subscriber_id == 0 ) {
            return redirect('/first-payment');
        }

        return $next($request);
    }
}
