# 📝 Pertemuan 8: Controller & Request di Laravel 10

Selamat datang di pertemuan kedelapan! Kali ini kita bakal jadi sutradara aplikasi: bikin **Controller**, ngatur **Route**, nangkep input user, validasi, sampai pasang **Middleware**.

## 🎯 Tujuan Pertemuan

Pada pertemuan ini, peserta diharapkan dapat:

- Membuat controller menggunakan Artisan di Laravel 10.  
- Mengonfigurasi route untuk controller (single‑action & resource).  
- Mengambil dan memproses input dari `Request` object.  
- Menerapkan validasi input, baik di controller maupun Form Request.  
- Membuat dan menggunakan middleware untuk proteksi route.  

## 📚 Materi yang Dibahas

1. **Membuat Controller**  
   - `php artisan make:controller NamaController`  
   - Resource controller (`--resource`) vs single‑action controller  

2. **Routing**  
   - Route dasar: `Route::get()`, `Route::post()`, `Route::put()`, `Route::delete()`  
   - Resource route: `Route::resource('posts', PostController::class)`  
   - Route grouping dan prefix  

3. **Request Input**  
   - Dependency injection: `public function store(Request $request)`  
   - Mengakses data: `$request->input('field')`, `$request->all()`, `$request->only([...])`  

4. **Validasi**  
   - `$request->validate([...])` di controller  
   - Membuat Form Request: `php artisan make:request StorePostRequest`  
   - Aturan built‑in (required, email, max, etc.) dan custom messages  

5. **Middleware**  
   - Membuat: `php artisan make:middleware CheckRole`  
   - Mendaftarkan di `app/Http/Kernel.php`  
   - Menerapkan pada route atau controller  

## 📥 Link Modul

Materi lengkap tersedia di:  
[Controller dan Request - Medium](https://medium.com/amcc-amikom/mengelola-request-dengan-controller-dan-middleware-a52a30aafb94)

## 🌟 Harapan Kami

Di sesi ini, kamu akan paham alur lengkap request dari user hingga diproses di controller, serta mahir menjagai validitas data lewat Form Request dan middleware. Dengan bekal ini, setiap endpoint yang kamu bangun akan lebih aman, terstruktur, dan mudah dipelihara. Terus eksplorasi pattern dan best practice Laravel 10, karena kontrol logika yang rapi adalah kunci aplikasi profesional. Semangat ngoding! 🚀