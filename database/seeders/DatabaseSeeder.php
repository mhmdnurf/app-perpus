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
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'zaldes@gmail.com',
            'password' => bcrypt('admin')
        ]);

        Member::create([
            'no_anggota' => 'AGG-0001',
            'nama' => 'Muhammmad Nurfatkhur Rahman',
            'nis' => 1219002,
            'jenis_kelamin' => 'Laki-laki',
            'kelas' => 3
        ]);

        Member::create([
            'no_anggota' => 'AGG-0002',
            'nama' => 'Tarisya',
            'nis' => 1219001,
            'jenis_kelamin' => 'Perempuan',
            'kelas' => 1
        ]);

        Member::create([
            'no_anggota' => 'AGG-0003',
            'nama' => 'Dwi Aulia Putri',
            'nis' => 1314,
            'jenis_kelamin' => 'Perempuan',
            'kelas' => 2
        ]);

        Member::create([
            'no_anggota' => 'AGG-0004',
            'nama' => 'Bawazir Esaputra',
            'nis' => 1219009,
            'jenis_kelamin' => 'Laki-laki',
            'kelas' => 6
        ]);

        Member::create([
            'no_anggota' => 'AGG-0005',
            'nama' => 'Mikhail',
            'nis' => 12689,
            'jenis_kelamin' => 'Laki-laki',
            'kelas' => 3
        ]);

        Member::create([
            'no_anggota' => 'AGG-0006',
            'nama' => 'Mira Santika',
            'nis' => 12122,
            'jenis_kelamin' => 'Perempuan',
            'kelas' => 5
        ]);

        Rack::create([
            'nama' => 'RAK-1',
            'keterangan' => '-'
        ]);

        Rack::create([
            'nama' => 'RAK-2',
            'keterangan' => '-'
        ]);

        Rack::create([
            'nama' => 'RAK-3',
            'keterangan' => '-'
        ]);

        Rack::create([
            'nama' => 'RAK-4',
            'keterangan' => '-'
        ]);

        Category::create([
            'nama' => 'Dongeng',
            'keterangan' => '-'
        ]);

        Category::create([
            'nama' => 'Agama',
            'keterangan' => '-'
        ]);

        Category::create([
            'nama' => 'Filsafat',
            'keterangan' => '-'
        ]);

        Category::create([
            'nama' => 'Ilmu Pengetahuan Sosial',
            'keterangan' => '-'
        ]);

        Category::create([
            'nama' => 'Ilmu Pengetahuan Alam',
            'keterangan' => '-'
        ]);



        Book::create([
            'category_id' => '1',
            'rack_id' => '1',
            'isbn' => '123424332323132',
            'judul' => 'Filosofi Teras',
            'penerbit' => 'Gramedia',
            'pengarang' => 'Muhammad Zakaria',
            'tahun' => '2018',
            'jumlah' => '1',
            'stok' => '1'
        ]);

        // Member::factory(20)->create();

        Book::factory(10)->create();
    }
}
