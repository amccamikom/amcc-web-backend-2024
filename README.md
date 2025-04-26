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

-   Laragon (Apache/Nginx & MySQL)
-   PHP **8.1+**
-   Composer **2.x**
-   VS Code (atau editor favorit teman-teman)
-   Pengetahuan dasar terminal/command line

### 🚀 Langkah-langkah Setup

#### 1. Nyalakan Laragon

1. Buka aplikasi Laragon
2. Klik tombol **Start All** sampai icon Laragon di system tray berubah hijau

#### 2. Buka Terminal Laragon

-   Klik ikon **Terminal** di Laragon
-   Secara otomatis teman-teman berada di `C:/laragon/www` atau di `D:/laragon/www`

#### 3. Dapatkan Kode Project

-   Jika baru, install Laravel (Silahkan sesuaikan nama `api-rental-mobil`):
    ```bash
    composer create-project "laravel/laravel:^10.0" api-rental-mobil
    ```
-   Jika teman-teman ingin download file dari repo AMCC bisa ikuti langkah-langkah disini [Panduan Mendownload Hasil Praktikum](https://github.com/amccamikom/amcc-web-backend-2024/tree/master?tab=readme-ov-file)

#### 4. Masuk ke Folder Project

```bash
cd api-rental-mobil
```

#### 5. Buka di VS Code

```bash
code .
```

#### 6. Siapkan Database

1. Akses: `http://localhost/phpmyadmin`
2. Klik **New**, beri nama misal `rental_mobil`, lalu **Create**

#### 7. Import SQL Schema

1. Di dalam project, temukan file `rental_mobil.sql` atau bisa download dari link berikut: [Download Database Rental Mobil](https://drive.google.com/file/d/1G01-tPpTB2HwgeXeGJWU-GYlY_oNjyjK/view?usp=sharing)
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
    DB_DATABASE=rental_mobil // sesuaikan dengan nama database teman-teman
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

// Menentukan namespace dari controller ini
namespace App\Http\Controllers;

// Mengimpor class Request untuk menangani HTTP request
use Illuminate\Http\Request;
// Mengimpor facade DB untuk menjalankan query database secara langsung
use Illuminate\Support\Facades\DB;

// Mendefinisikan class controller bernama CarController
class CarController extends Controller
{
    // Method statis untuk mengambil semua data dari tabel 'cars'
    public static function getAllCarRaw()
    {
        // Menjalankan query SQL secara mentah (raw) untuk select semua data dari tabel 'cars'
        return DB::select('SELECT * FROM cars');
    }
}

```

#### 13. Tambahkan Route di `routes/api.php`

```php
// Mengimpor CarController agar bisa digunakan di routing
use App\Http\Controllers\CarController;

// Route GET ke endpoint /cars akan memanggil method getAllCarRaw dari CarController
Route::get('/cars', [CarController::class, 'getAllCarRaw']);

// Route GET ke endpoint /halo akan mengembalikan string 'halo, Adib!'
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
