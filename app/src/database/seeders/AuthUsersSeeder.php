<?php

namespace Database\Seeders;

use App\Models\AuthUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AuthUsers::create([
            'name' => 'jobi',
            'password' => 'jobi'
        ]);
    }
}
