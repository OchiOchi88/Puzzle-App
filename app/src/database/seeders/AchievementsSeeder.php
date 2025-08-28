<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievement;

class AchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::create([
            'achieve_number' => 1,
            'name' => "研修卒業",
            'detail' => "最初のステージをクリアして、一人前の研究者になる。",
            'score' => 10
        ]);
        Achievement::create([
            'achieve_number' => 2,
            'name' => "元素学士",
            'detail' => "ステージ１０をクリアして、研究の面白みに没頭する。",
            'score' => 70
        ]);
        Achievement::create([
            'achieve_number' => 3,
            'name' => "元素教授",
            'detail' => "ステージ２０をクリアして、指折りの専門家として元素だけでなく周りをも導く。",
            'score' => 220
        ]);
        Achievement::create([
            'achieve_number' => 4,
            'name' => "生きる名誉",
            'detail' => "最後のステージをクリアして、その道に人生を捧げる。",
            'score' => 700
        ]);
        Achievement::create([
            'achieve_number' => 5,
            'name' => "生徒への初授業",
            'detail' => "作ったステージを初めて遊んでもらい、かつてない緊張を実感する。",
            'score' => 200
        ]);
        Achievement::create([
            'achieve_number' => 6,
            'name' => "指導に優れた先生",
            'detail' => "空白タイルのないステージを作り、元素と生徒を的確に導く。",
            'score' => 100
        ]);
        Achievement::create([
            'achieve_number' => 7,
            'name' => "徹夜の試行錯誤",
            'detail' => "ノーマルステージで元素をゴールさせずにギミックタイルを100回踏ませて、実験室で夜を明かす。",
            'score' => 200
        ]);
    }
}
