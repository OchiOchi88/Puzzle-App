<?php

namespace Database\Seeders;

use App\Models\UserAchievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAchievement::create([
            'user_id' => 1,
            'achievement_id' => 1
        ]);
        UserAchievement::create([
            'user_id' => 1,
            'achievement_id' => 2
        ]);
        UserAchievement::create([
            'user_id' => 1,
            'achievement_id' => 3
        ]);
        UserAchievement::create([
            'user_id' => 1,
            'achievement_id' => 4
        ]);
    }
}
