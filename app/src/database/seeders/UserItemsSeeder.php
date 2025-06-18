<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserItem;

class UserItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserItem::create([
            'user_id' => 1,
            'item_id' => 1,
            'amount' => 3
        ]);
        UserItem::create([
            'user_id' => 2,
            'item_id' => 1,
            'amount' => 1
        ]);
        UserItem::create([
            'user_id' => 2,
            'item_id' => 2,
            'amount' => 1
        ]);
        UserItem::create([
            'user_id' => 3,
            'item_id' => 4,
            'amount' => 1
        ]);
        UserItem::create([
            'user_id' => 4,
            'item_id' => 1,
            'amount' => 1
        ]);
        UserItem::create([
            'user_id' => 4,
            'item_id' => 5,
            'amount' => 1
        ]);
        UserItem::create([
            'user_id' => 5,
            'item_id' => 2,
            'amount' => 2
        ]);
        UserItem::create([
            'user_id' => 6,
            'item_id' => 3,
            'amount' => 1
        ]);
        UserItem::create([
            'user_id' => 7,
            'item_id' => 5,
            'amount' => 2
        ]);
        UserItem::create([
            'user_id' => 7,
            'item_id' => 6,
            'amount' => 1
        ]);
    }
}
