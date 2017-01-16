<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 15/01/17
 * Time: 02:47 PM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class Auth
{
    public static function login(Request $request)
    {
        $token = $request->header('token');
        return User::where('token', $token)->first();
    }

    public static function check($request)
    {
        return (count(self::login($request)) > 0) ? true : false;
    }
}