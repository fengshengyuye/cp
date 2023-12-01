<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $user1 = User::find(1);
        $user1->email = 'aaa@qq.com';
        $user1->name = '超级管理员';
        $user1->avatar = url('fakes/images/avatar.jpg');
        $user1->save();
        $user2 = User::find(2);
        $user2->email = 'bbb@qq.com';
        $user2->name = '普通用户';
        $user2->avatar = url('fakes/images/avatar.jpg');
        $user2->save();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            InfoSeeder::class,
            CatSeeder::class,
            SubSeeder::class,
            ProductSeeder::class,
        ]);

    }
}
