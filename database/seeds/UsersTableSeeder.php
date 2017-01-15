<?php

/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 14/01/17
 * Time: 07:08 PM
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            [
                'first_name' => 'Demo',
                'last_name' => 'Demo',
                'email' => 'demo@demo.com',
                'token' => '4oigKQThQfilJH0077+VT+WJu3DcSeuk4peE4gRI+Nw=',
            ]
        );
    }
}