<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Member;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Tarisya',
            'username' => 'tarisa',
            'email' => 'tarisamarufi@gmail.com',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Muhammad Nurfatkhur Rahman',
            'username' => 'nurfat',
            'email' => 'zaldebarenz@gmail.com',
            'password' => bcrypt('admin')
        ]);

        Member::factory(20)->create();
    }
}
