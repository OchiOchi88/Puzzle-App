<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clan;

class ClansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clan::create([
            'name' => '神の弟子'
        ]);
        Clan::create([
            'name' => '魔の生徒'
        ]);
        Clan::create([
            'name' => '竜の家族'
        ]);
        Clan::create([
            'name' => '復讐者'
        ]);
    }
}
