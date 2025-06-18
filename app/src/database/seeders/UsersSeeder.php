<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'nico',
            'lvl' => 187,
            'exp' => 55,
            'clan' => 0
        ]);
        User::create([
            'name' => 'karla',
            'lvl' => 195,
            'exp' => 55,
            'clan' => 3
        ]);
        User::create([
            'name' => 'marie',
            'lvl' => 250,
            'exp' => 55,
            'clan' => 2
        ]);
        User::create([
            'name' => 'axia',
            'lvl' => 242,
            'exp' => 55,
            'clan' => 3
        ]);
        User::create([
            'name' => 'fellya',
            'lvl' => 190,
            'exp' => 55,
            'clan' => 2
        ]);
        User::create([
            'name' => 'sarah',
            'lvl' => 301,
            'exp' => 55,
            'clan' => 1
        ]);
        User::create([
            'name' => 'nostrette',
            'lvl' => 545,
            'exp' => 55,
            'clan' => 4
        ]);
    }
}
