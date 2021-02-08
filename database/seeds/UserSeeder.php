<?php

use Illuminate\Database\Seeder;
use App\User; // User モデル読み込み

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate(); //データ⼀括削除
        factory(User::class, 50)->create(); //50件のテストデータ追加
    }
}
