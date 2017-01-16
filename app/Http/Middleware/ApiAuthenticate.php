<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 15/01/17
 * Time: 02:43 PM
 */

namespace App\Http\Middleware;

use Closure;
use Validator;
use App\Http\Controllers\Auth;
use Illuminate\Http\Response;

class ApiAuthenticate
{

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $validator = Validator::make($request->header(), [
            'token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
        if (!Auth::check($request)) {
            return response()->json(['error' => 'Access Denied. Invalid Token'], Response::HTTP_OK);
        }
        return $next($request);
    }
}