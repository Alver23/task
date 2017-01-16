<?php

/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 14/01/17
 * Time: 06:39 PM
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PrioritiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('priorities')->insert([
            [
                'name' => 'High',
            ],
            [
                'name' => 'Medium',
            ],
            [
                'name' => 'Low',
            ]
        ]);
    }
}