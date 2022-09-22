<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Tarisya',
            'username' => 'tarisa',
            'email' => 'tarisamarufi@gmail.com',
            'password' => bcrypt('12345')
        ]);

        // User::factory(3)->create();
    }
}
