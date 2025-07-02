<?php

namespace Database\Seeders;

use App\Models\Stage;
use App\Models\StageCell;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stage::create([
            'name' => 'このゲームへようこそ！',
            'xLen' => 5,
            'yLen' => 5
        ]);
        Stage::create([
            'name' => 'このゲームに慣れていこう',
            'xLen' => 7,
            'yLen' => 7
        ]);
        Stage::create([
            'name' => 'ギミックに触れてみよう',
            'xLen' => 5,
            'yLen' => 5
        ]);
    }
}
