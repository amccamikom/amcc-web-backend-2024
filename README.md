# 📝 Pertemuan 7: Database di Laravel 10

Selamat datang di pertemuan ketujuh! Di sesi ini kita akan mendalami manajemen **database** di Laravel 10. Kali ini teman-teman akan belajar mulai dari konfigurasi hingga generate data dummy yang siap dipakai.

## 🎯 Tujuan Pertemuan

Pada pertemuan ini, peserta diharapkan dapat:

- Memahami cara konfigurasi koneksi database di file `.env` pada Laravel 10.  
- Melakukan rollback, refresh migrasi, dan membuat skema tabel dengan foreign key.  
- Membuat dan menjalankan **seeder** serta **factory** untuk generate data dummy.  
- Mengambil data menggunakan query builder dan Eloquent (`where()`, dsb.).  
- Mengimplementasikan operasi CRUD (insert, select, update, delete) pada database.  

## 📚 Materi yang Dibahas

1. **Konfigurasi Database**  
   - Pengaturan di `.env` (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)  
   - Struktur `config/database.php` di Laravel 10  

2. **Migrasi**  
   - Artisan commands:  
     - `php artisan migrate`  
     - `php artisan migrate:rollback`  
     - `php artisan migrate:refresh`  
   - Definisi kolom, indeks, dan foreign key pada schema builder  

3. **Seeder & Factory**  
   - Membuat seeder: `php artisan make:seeder NamaSeeder`  
   - Mendaftarkan seeder di `DatabaseSeeder`  
   - Membuat factory: `php artisan make:factory NamaFactory --model=Model`  
   - Men‑generate data dummy: `Model::factory()->count(10)->create()`  

4. **Fetching Data**  
   - Query Builder: `DB::table('users')->where('status', 'active')->get()`  
   - Eloquent: `User::where('status', 'active')->first()`  

5. **CRUD Dasar**  
   - **Insert**: `Model::create([...])`, `DB::table()->insert([...])`  
   - **Select**: `Model::all()`, `Model::find($id)`, `where()`  
   - **Update**: `$model->update([...])`, `DB::table()->where()->update([...])`  
   - **Delete**: `$model->delete()`, `DB::table()->where()->delete()`  

## 📥 Link Modul

Materi lengkap tersedia di:  
[Database di Laravel - Medium](https://medium.com/amcc-amikom/per-database-an-di-laravel-82b4e9e3c0e5)

## 🌟 Harapan Kami

Setelah menguasai pertemuan ini, teman-teman akan memiliki fondasi kuat dalam mengelola struktur database di Laravel 10. Dari setup koneksi sampai generate data dummy, semuanya dirancang agar aplikasimu scalable dan minim bug. Semoga teman-teman semakin percaya diri memanipulasi data dan siap membangun fitur‑fitur kompleks di sesi selanjutnya. Happy coding! 🚀