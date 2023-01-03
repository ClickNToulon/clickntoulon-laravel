<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  Request  $request
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
			if ($request->route()->named('employee.*')) {
				return route('employee.login');
			}
			return route('login');
		}
	}
}
