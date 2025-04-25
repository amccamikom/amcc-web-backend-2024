# 📝 Pertemuan 5: Pengenalan Laravel

Selamat datang di pertemuan kelima! Di sesi ini, kita akan memulai perjalanan dengan **Laravel**, framework PHP yang populer untuk membangun aplikasi web modern.

## 🎯 Tujuan Pertemuan

Pada pertemuan ini, peserta diharapkan dapat:

-   Memahami dasar penggunaan Composer untuk manajemen dependensi.
-   Menginstal Laravel di lingkungan lokal.
-   Mengenal konsep dasar Laravel, termasuk MVC dan API.
-   Memahami struktur folder Laravel.
-   Mengenal penggunaan command-line tool **PHP artisan**.
-   Memahami routing dasar dan konfigurasi awal di Laravel.

## 📚 Materi yang Dibahas

1. **Composer**: Alat untuk mengelola dependensi PHP.
2. **Instalasi Laravel**: Langkah-langkah menginstal Laravel.
3. **Pengenalan Laravel**: Konsep MVC (Model-View-Controller) dan API.
4. **Struktur Folder Laravel**: Mengenal struktur folder dan file penting.
5. **PHP Artisan**: Command-line tool bawaan Laravel.
6. **Routing Dasar**: Membuat dan mengatur routing di Laravel.

## Hasil Praktikum

**Deskripsi:**
Panduan lengkap langkah demi langkah untuk menyiapkan dan menjalankan project **API Rental Mobil** berbasis Laravel 10.

### 📋 Prasyarat

-   Laragon (dengan Apache/Nginx & MySQL) terinstall
-   Composer terinstall di sistem
-   VS Code (atau editor favorit kamu)
-   Pengetahuan dasar terminal/command line

### 🚀 Langkah-langkah Setup

#### 1. Nyalakan Laragon

1. Buka aplikasi Laragon
2. Klik tombol **Start All** sampai icon Laragon di system tray berubah hijau

#### 2. Buka Terminal Laragon

-   Klik ikon **Terminal** di Laragon
-   Secara otomatis kamu berada di `C:/laragon/www`

#### 3. Install Laravel 10

```bash
composer create-project "laravel/laravel:^10.0" api-rental-mobil
```

-   Ganti `api-rental-mobil` sesuai keinginan nama project-mu

#### 4. Masuk ke Folder Project

```bash
cd api-rental-mobil
```

#### 5. Buka di VS Code

```bash
code .
```

-   Atau download hasil praktikum ini dari repo jika butuh dengan bantuan petunjuk:
    [Panduan Mendonwload Hasil Praktikum](https://github.com/amccamikom/amcc-web-backend-2024/tree/master?tab=readme-ov-file)

#### 6. Siapkan Database

1. Akses: `http://localhost/phpmyadmin`
2. Klik **New**, beri nama misal `rental_mobil`, lalu **Create**

#### 7. Import SQL Schema

1. Di dalam project, temukan file `rental_mobil.sql`
2. Di phpMyAdmin, pilih database `rental_mobil` → tab **Import** → upload `.sql` → **Go**

#### 8. Konfigurasi `.env`

1. Jika belum ada, jalankan:
    ```bash
    cp .env.example .env
    ```
2. Buka `.env`, ubah bagian database:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=rental_mobil
    DB_USERNAME=root
    DB_PASSWORD=
    ```
3. Simpan perubahan

#### 9. Generate App Key

```bash
php artisan key:generate
```

#### 10. Buat Model `Car`

```bash
php artisan make:model Car
```

#### 11. Buat Controller `CarController`

```bash
php artisan make:controller CarController
```

#### 12. Update `CarController`

Buka `app/Http/Controllers/CarController.php` dan ganti isinya:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public static function getAllCarRaw()
    {
        return DB::select('SELECT * FROM cars');
    }
}
```

#### 13. Tambahkan Route di `routes/api.php`

```php
use App\Http\Controllers\CarController;

Route::get('/cars', [CarController::class, 'getAllCarRaw']);
Route::get('/halo', function() {
    return 'halo, Adib!';
});
```

#### 14. Jalankan Server Laravel

```bash
php artisan serve
```

#### 15. Uji Endpoint

-   `http://127.0.0.1:8000/api/cars` → tampilkan data JSON dari tabel `cars`
-   `http://127.0.0.1:8000/api/halo` → tampilkan teks **halo, Adib!**

## 📥 Link Modul

Semua materi pertemuan ini tersedia dalam modul yang dapat teman-teman baca secara online:  
[Pengenalan Laravel - Medium](https://medium.com/amcc-amikom/pengenalan-laravel-2341b50a60a0)

## 🌟 Harapan Kami

Kami berharap teman-teman dapat memahami dasar-dasar Laravel yang telah disampaikan. Selamat belajar dan semoga sukses dalam membangun aplikasi web yang hebat menggunakan Laravel! 🚀
