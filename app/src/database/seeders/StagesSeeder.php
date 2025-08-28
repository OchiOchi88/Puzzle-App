<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StagesSeeder extends Seeder
{

    public function run(): void
    {
        Stage::create([
            'level' => 1,
            'name' => "新人研修"
        ]);
        Stage::create([
            'level' => 2,
            'name' => "簡単な実験１"
        ]);
        Stage::create([
            'level' => 3,
            'name' => "簡単な実験２"
        ]);
        Stage::create([
            'level' => 4,
            'name' => "簡単な実験３"
        ]);
        Stage::create([
            'level' => 5,
            'name' => "簡単な実験４"
        ]);
        Stage::create([
            'level' => 6,
            'name' => "並の実験１"
        ]);
        Stage::create([
            'level' => 7,
            'name' => "並の実験２"
        ]);
        Stage::create([
            'level' => 8,
            'name' => "並の実験３"
        ]);
        Stage::create([
            'level' => 9,
            'name' => "並の実験４"
        ]);
        Stage::create([
            'level' => 10,
            'name' => "専門的な実験１"
        ]);
    }
}
