<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tile;

class TilesSeeder extends Seeder
{
    /**
     * type: 1 ノーマルタイル
     * 2~5     方向転換タイル(上、右、下、左)
     * 6~11    地雷タイル(起動、１、２、３、４、５)
     * 12~14   特殊方向転換タイル(時計回り、反時計回り、反発)
     * 15~20   充電タイル(100%、80%、60%、40%、20%、0%)
     * 21      エンジニアタイル(エンジニアタイルは反発以外の方向転換系タイルを反転、地雷タイルを１回遅らせる)
     * 99      空タイル (プレイヤーに設置させる)
     */
    public function run(): void
    {
        Tile::create([
            'stage' => 1,
            'x' => -2,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 1,
            'x' => -1,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 1,
            'x' => 0,
            'y' => 0,
            'type' => 99
        ]);
        Tile::create([
            'stage' => 1,
            'x' => 1,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 1,
            'x' => 2,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 2,
            'x' => 0,
            'y' => -3,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 2,
            'x' => 0,
            'y' => -2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 2,
            'x' => 0,
            'y' => -1,
            'type' => 99
        ]);
        Tile::create([
            'stage' => 2,
            'x' => 0,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 2,
            'x' => 0,
            'y' => 1,
            'type' => 99
        ]);
        Tile::create([
            'stage' => 2,
            'x' => 0,
            'y' => 2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 2,
            'x' => 0,
            'y' => 3,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 3,
            'x' => -2,
            'y' => -2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 3,
            'x' => -2,
            'y' => -1,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 3,
            'x' => -2,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 3,
            'x' => -2,
            'y' => 1,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 3,
            'x' => -2,
            'y' => 2,
            'type' => 99
        ]);
        Tile::create([
            'stage' => 3,
            'x' => -1,
            'y' => 2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 3,
            'x' => 0,
            'y' => 2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 3,
            'x' => 1,
            'y' => 2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 3,
            'x' => 2,
            'y' => 2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => -3,
            'y' => -5,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => -3,
            'y' => -4,
            'type' => 99
        ]);
        Tile::create([
            'stage' => 4,
            'x' => -3,
            'y' => -3,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => -3,
            'y' => -2,
            'type' => 3
        ]);
        Tile::create([
            'stage' => 4,
            'x' => -2,
            'y' => -2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => -1,
            'y' => -2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => 0,
            'y' => -2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => 1,
            'y' => -2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => 2,
            'y' => -2,
            'type' => 99
        ]);
        Tile::create([
            'stage' => 4,
            'x' => 2,
            'y' => -1,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => 2,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => 2,
            'y' => 1,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 4,
            'x' => 2,
            'y' => 2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => -4,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => -3,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => -2,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => -1,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 0,
            'y' => 0,
            'type' => 99
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 1,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 2,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 3,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 4,
            'y' => 0,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 0,
            'y' => -4,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 0,
            'y' => -3,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 0,
            'y' => -2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 0,
            'y' => -1,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 0,
            'y' => 1,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 0,
            'y' => 2,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 0,
            'y' => 3,
            'type' => 1
        ]);
        Tile::create([
            'stage' => 5,
            'x' => 0,
            'y' => 4,
            'type' => 1
        ]);
    }
}
