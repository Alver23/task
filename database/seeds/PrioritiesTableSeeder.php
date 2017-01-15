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
                'owner_user_id' => 1,
                'updater_user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Medium',
                'owner_user_id' => 1,
                'updater_user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Low',
                'owner_user_id' => 1,
                'updater_user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}