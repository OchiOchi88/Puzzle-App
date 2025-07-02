<?php

namespace Database\Seeders;

use App\Models\StageObject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StagesObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StageObject::create([
            'name' => 'ノーマルタイル'
        ]);
        StageObject::create([
            'name' => '方向転換タイル'
        ]);
        StageObject::create([
            'name' => '空タイル'
        ]);
        StageObject::create([
            'name' => 'スタートタイル'
        ]);
        StageObject::create([
            'name' => 'スタート元素'
        ]);
        StageObject::create([
            'name' => 'ゴール元素'
        ]);
    }
}
