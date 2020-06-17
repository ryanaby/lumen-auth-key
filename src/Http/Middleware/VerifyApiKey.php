<?php

namespace Ryanaby\LumenAuthKey\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Ryanaby\LumenAuthKey\Models\AuthKey;

class VerifyApiKey
{
    protected $auth_header = 'X-auth-key';

    /**
     * Handle the incoming request
     *
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed|\Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $authKey = $request->header($this->auth_header);

        if (AuthKey::keyIsValid($authKey)) {
            return $next($request);
        }

        return response([
            'errors' => [[
                'message' => 'Unauthorized Access'
            ]]
        ], 401);
    }
}
