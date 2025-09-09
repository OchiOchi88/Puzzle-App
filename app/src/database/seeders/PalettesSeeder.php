<?php

namespace Database\Seeders;

use App\Models\Palette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PalettesSeeder extends Seeder
{
    /**
     * type: 1 ノーマルタイル
     * 2~5     方向転換タイル(上、右、下、左)
     * 6~11    地雷タイル(起動、１、２、３、４、５)
     * 12~14   特殊方向転換タイル(時計回り、反時計回り、反発)
     * 15~20   充電タイル(100%、80%、60%、40%、20%、0%)
     * 21      エンジニアタイル(エンジニアタイルは反発以外の方向転換系タイルを反転、地雷タイルを１回遅らせる)
     */
    public function run(): void
    {
        Palette::create([
            'stage' => 1,
            'type' => 1
        ]);
        Palette::create([
            'stage' => 2,
            'type' => 1
        ]);
        Palette::create([
            'stage' => 3,
            'type' => 1
        ]);
        Palette::create([
            'stage' => 3,
            'type' => 2
        ]);
        Palette::create([
            'stage' => 3,
            'type' => 3
        ]);
        Palette::create([
            'stage' => 3,
            'type' => 4
        ]);
        Palette::create([
            'stage' => 3,
            'type' => 5
        ]);
        Palette::create([
            'stage' => 4,
            'type' => 1
        ]);
        Palette::create([
            'stage' => 4,
            'type' => 2
        ]);
        Palette::create([
            'stage' => 4,
            'type' => 3
        ]);
        Palette::create([
            'stage' => 4,
            'type' => 4
        ]);
        Palette::create([
            'stage' => 4,
            'type' => 5
        ]);
        Palette::create([
            'stage' => 5,
            'type' => 1
        ]);
        Palette::create([
            'stage' => 5,
            'type' => 2
        ]);
        Palette::create([
            'stage' => 5,
            'type' => 3
        ]);
        Palette::create([
            'stage' => 5,
            'type' => 4
        ]);
        Palette::create([
            'stage' => 5,
            'type' => 5
        ]);
        Palette::create([
            'stage' => 6,
            'type' => 1
        ]);
        Palette::create([
            'stage' => 6,
            'type' => 2
        ]);
        Palette::create([
            'stage' => 6,
            'type' => 3
        ]);
        Palette::create([
            'stage' => 6,
            'type' => 4
        ]);
        Palette::create([
            'stage' => 6,
            'type' => 5
        ]);
        Palette::create([
            'stage' => 6,
            'type' => 12
        ]);
        Palette::create([
            'stage' => 6,
            'type' => 13
        ]);
        Palette::create([
            'stage' => 6,
            'type' => 14
        ]);
        Palette::create([
            'stage' => 7,
            'type' => 1
        ]);
        Palette::create([
            'stage' => 7,
            'type' => 2
        ]);
        Palette::create([
            'stage' => 7,
            'type' => 3
        ]);
        Palette::create([
            'stage' => 7,
            'type' => 4
        ]);
        Palette::create([
            'stage' => 7,
            'type' => 5
        ]);
        Palette::create([
            'stage' => 7,
            'type' => 15
        ]);
        Palette::create([
            'stage' => 8,
            'type' => 1
        ]);
        Palette::create([
            'stage' => 8,
            'type' => 2
        ]);
        Palette::create([
            'stage' => 8,
            'type' => 3
        ]);
        Palette::create([
            'stage' => 8,
            'type' => 4
        ]);
        Palette::create([
            'stage' => 8,
            'type' => 5
        ]);
        Palette::create([
            'stage' => 8,
            'type' => 12
        ]);
        Palette::create([
            'stage' => 8,
            'type' => 13
        ]);
        Palette::create([
            'stage' => 8,
            'type' => 14
        ]);
        Palette::create([
            'stage' => 8,
            'type' => 20
        ]);
    }
}
