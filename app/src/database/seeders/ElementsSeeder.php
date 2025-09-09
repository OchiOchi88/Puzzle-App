<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Element;

class ElementsSeeder extends Seeder
{
    /**
     * type: 1 上
     *  2      右
     *  3      下
     *  4      左
     *  0      ゴールエレメント
     */
    public function run(): void
    {
        Element::create([
            'stage' => 1,
            'x' => -2,
            'y' => 0,
            'type' => 2
        ]);
        Element::create([
            'stage' => 1,
            'x' => 2,
            'y' => 0,
            'type' => 0
        ]);
        Element::create([
            'stage' => 2,
            'x' => 0,
            'y' => -3,
            'type' => 1
        ]);
        Element::create([
            'stage' => 2,
            'x' => 0,
            'y' => 3,
            'type' => 0
        ]);
        Element::create([
            'stage' => 3,
            'x' => -2,
            'y' => -2,
            'type' => 1
        ]);
        Element::create([
            'stage' => 3,
            'x' => 2,
            'y' => 2,
            'type' => 0
        ]);
        Element::create([
            'stage' => 4,
            'x' => -3,
            'y' => -5,
            'type' => 1
        ]);
        Element::create([
            'stage' => 4,
            'x' => 2,
            'y' => 2,
            'type' => 0
        ]);
        Element::create([
            'stage' => 5,
            'x' => 0,
            'y' => 4,
            'type' => 3
        ]);
        Element::create([
            'stage' => 5,
            'x' => 0,
            'y' => -3,
            'type' => 1
        ]);
        Element::create([
            'stage' => 5,
            'x' => -4,
            'y' => 0,
            'type' => 0
        ]);
        Element::create([
            'stage' => 5,
            'x' => 3,
            'y' => 0,
            'type' => 0
        ]);
    }
}
