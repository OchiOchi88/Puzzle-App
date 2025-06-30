<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserDetail::create([
            'level' => 100,
            'exp' => 1600,
            'totalExp' => 122000
        ]);
        UserDetail::create([
            'level' => 175,
            'exp' => 200,
            'totalExp' => 710000
        ]);
        UserDetail::create([
            'level' => 201,
            'exp' => 1990,
            'totalExp' => 1320000
        ]);
        UserDetail::create([
            'level' => 115,
            'exp' => 2000,
            'totalExp' => 160000
        ]);
    }
}
