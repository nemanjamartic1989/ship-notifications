<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        User::insert([
            [
                'name' => 'Petar Petrovic',
                'email' => 'petar.petrovic@gmail.com',
                'access_level_id' => 1,
                'password' => Hash::make('Petar12!'),
                'is_deleted' => 0,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Jovan Jovanovic',
                'email' => 'jovan.jovanovic@gmail.com',
                'access_level_id' => 2,
                'password' => Hash::make('Jovan12!'),
                'is_deleted' => 0,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
