<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SensorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensors')->insert([
            'type' => 'temperature',
            'value' => rand(-20,30),
        ]);
        DB::table('sensors')->insert([
            'type' => 'smoke',
            'value' => rand(0,30),
        ]);
        DB::table('sensors')->insert([
            'type' => 'humidity',
            'value' => rand(0,30),
        ]);
        DB::table('sensors')->insert([
            'type' => 'flame',
            'value' => rand(0,1),
        ]);
    }
}
