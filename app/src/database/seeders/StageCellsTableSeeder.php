<?php

namespace Database\Seeders;

use App\Models\Stage;
use App\Models\StageCell;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StageCellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StageCell::create([
            'stage_id' => 1,
            'x' => -2,
            'y' => 0,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 1,
            'x' => -1,
            'y' => 0,
            'object_id' => 1,   //  ノーマルタイル
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 1,
            'x' => 0,
            'y' => 0,
            'object_id' => 0,   //  空タイル
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 1,
            'x' => 1,
            'y' => 0,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 1,
            'x' => 2,
            'y' => 0,
            'object_id' => 99,  //  スタートタイル
            'object_type' => 3  //  左向き
        ]);
        StageCell::create([
            'stage_id' => 1,
            'x' => 2,
            'y' => 0,
            'object_id' => 100,  //  スタート元素
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 1,
            'x' => -2,
            'y' => 0,
            'object_id' => 101, //  ゴール元素
            'object_type' => 0
        ]);

        StageCell::create([
            'stage_id' => 2,
            'x' => -3,
            'y' => 0,
            'object_id' => 99,
            'object_type' => 1  //  右向き
        ]);
        StageCell::create([
            'stage_id' => 2,
            'x' => -2,
            'y' => 0,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 2,
            'x' => -1,
            'y' => 0,
            'object_id' => 0,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 2,
            'x' => 0,
            'y' => 0,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 2,
            'x' => 1,
            'y' => 0,
            'object_id' => 0,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 2,
            'x' => 2,
            'y' => 0,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 2,
            'x' => 3,
            'y' => 0,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 2,
            'x' => -3,
            'y' => 0,
            'object_id' => 100,  //  スタート元素
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 2,
            'x' => 3,
            'y' => 0,
            'object_id' => 101, //  ゴール元素
            'object_type' => 0
        ]);

        StageCell::create([
            'stage_id' => 3,
            'x' => -1,
            'y' => -1,
            'object_id' => 99,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 3,
            'x' => -1,
            'y' => 0,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 3,
            'x' => -1,
            'y' => 1,
            'object_id' => 2,   //  方向転換タイル
            'object_type' => 1
        ]);
        StageCell::create([
            'stage_id' => 3,
            'x' => 0,
            'y' => 1,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 3,
            'x' => 1,
            'y' => 1,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 3,
            'x' => 2,
            'y' => 1,
            'object_id' => 1,
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 3,
            'x' => -1,
            'y' => -1,
            'object_id' => 100,  //  スタート元素
            'object_type' => 0
        ]);
        StageCell::create([
            'stage_id' => 3,
            'x' => 2,
            'y' => 1,
            'object_id' => 101, //  ゴール元素
            'object_type' => 0
        ]);
    }
}
