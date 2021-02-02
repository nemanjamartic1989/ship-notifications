<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccessLevelSeeder extends Seeder
{

    public function run()
    {
        $now = Carbon::now();

        DB::table('access_levels')->insert([
            [
                'name' => 'Administrator',
                'created_at' => $now,
                'updated_at' => $now
            ], 
            [
                'name' => 'Custom User',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
