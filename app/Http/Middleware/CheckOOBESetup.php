<?php

namespace App\Http\Middleware;

use Closure;
use Response;

use App\Http\Controllers\OOBESetupController;

class CheckOOBESetup
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
        //Ensure it's not in the excluded list
        if (!in_array($request->path(), $this->except)) {
            
            //Check to see if the Initial Out of Box Experience Setup has been run...
            $oobeCheck = new OOBESetupController;

            return $oobeCheck->processOOBEStatus();
        }

        return $next($request);
    }

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'initial-setup'
    ];
}
