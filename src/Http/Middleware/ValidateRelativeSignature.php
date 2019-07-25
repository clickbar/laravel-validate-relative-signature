<?php

namespace Clickbar\ValidateRelativeSignature\Http\Middleware;

use Closure;
use Illuminate\Routing\Exceptions\InvalidSignatureException;

class ValidateRelativeSignature
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
        $isAbsolute = false;
        if ($request->hasValidSignature($isAbsolute)) {
            return $next($request);
        }

        throw new InvalidSignatureException();
    }
}
