<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Household;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Invitation;
use Illuminate\Support\Facades\Hash;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        // 1️⃣ Household 作成
        $household = Household::create([
            'name' => '佐藤家',
            'owner_id' => null,
        ]);

        // 2️⃣ User 作成
        $user = User::create([
            'name' => '佐藤 太郎',
            'email' => 'taro.sato@example.com',
            'password' => Hash::make('password'),
            'household_id' => $household->id
        ]);

        // 3️⃣ Household owner_id 更新
        $household->owner_id = $user->id;
        $household->save();

        // 4️⃣ Category 作成
        $category = Category::create([
            'household_id' => $household->id,
            'name' => '食費'
        ]);

        // 5️⃣ Transaction 作成
        Transaction::create([
            'household_id' => $household->id,
            'user_id' => $user->id,
            'category_id' => $category->id,
            'type' => 'expense',
            'amount' => 1500,
            'date' => '2026-02-12',
            'note' => '昼食'
        ]);

        // 6️⃣ Invitation 作成
        Invitation::create([
            'household_id' => $household->id,
            'email' => 'hanako.sato@example.com',
            'token' => 'dummy-token-123',
            'status' => 'pending'
        ]);
    }
}
