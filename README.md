<h1 align="center">Sistem Informasi Perpustakaan Sederhana Berbasis Website dengan Laravel</h1>

### Apa saja data yang masuk pada website perpustakaan ini?

Sistem ini mencakup proses pengolahan data anggota, data rak, data kategori, data buku, transaksi peminjaman dan pengembalian serta laporan.

---

### Apa requirements untuk menjalankan web ini?

Karena dibuat menggunakan laravel 8, maka dibutuhkan versi PHP 7.3 keatas.

### Default Akun untuk login

-   Username: admin
-   Password: admin

---

## Install

1. **Buka Folder pada Text Editor**

```bash
Jalankan pada terminal :
composer update
npm install
copy .env.example .env
```

2. **Buat database dengan nama db_perpus kemudian buka `.env` kemudian sesuaikan seperti dibawah ini.**

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_perpus
DB_USERNAME=root
DB_PASSWORD=
```

3. **Setup sebelum menjalankan**

```bash
php artisan key:generate
php artisan migrate:fresh --seed
```

4. **Jalankan web**

```command
php artisan serve
```

## Author

**Muhammad Nurfatkhur Rahman**

-   Instagram : <a href="https://www.instagram.com/mhmd.zaka/"> Muhammad Nurfatkhur Rahman</a>
-   LinkedIn : <a href="https://www.linkedin.com/in/mhmd-nurfat/"> Muhammad Nurfatkhur Rahman</a>
-   Showwcase : <a href="https://www.showwcase.com/mhmdnurf"> Muhammad Nurfatkhur Rahman</a>

## 📝 License

-   Copyright © 2022 Muhammad Nurfatkhur Rahman.

---
