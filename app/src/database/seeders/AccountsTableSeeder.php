<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([
            'name' => 'jobi',
            'password' => Hash::make('jobi')
        ]);

        Account::create([
            'name' => 'SA2',
            'password' => Hash::make('mangetsuyabao')
        ]);

        Account::create([
            'name' => 'Saikatsu',
            'password' => Hash::make('tanoshimida')
        ]);

        Account::create([
            'name' => 'Shinka',
            'password' => Hash::make('gamagaeru')
        ]);
    }
}
