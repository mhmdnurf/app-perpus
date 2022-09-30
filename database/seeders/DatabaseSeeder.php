<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Rack;
use App\Models\User;
use App\Models\Member;
use App\Models\Category;
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

        Book::create([
            'category_id' => '1',
            'rack_id' => '2',
            'isbn' => '123-4243-32323-132',
            'title' => 'Filosofi Teras',
            'penerbit' => 'Gramedia',
            'pengarang' => 'Muhammad Zakaria',
            'tahun' => '2018',
            'stok' => '10'
        ]);

        Rack::create([
            'name' => 'RAK 1',
            'slug' => 'rak-1',
            'keterangan' => '-'
        ]);

        Rack::create([
            'name' => 'RAK 2',
            'slug' => 'rak-2',
            'keterangan' => '-'
        ]);

        Category::create([
            'name' => 'Filsafat',
            'slug' => 'filsafat',
            'keterangan' => '-'
        ]);

        Category::create([
            'name' => 'Ilmu Sosial',
            'slug' => 'ilmu-sosial',
            'keterangan' => '-'
        ]);

        Member::factory(20)->create();
    }
}
