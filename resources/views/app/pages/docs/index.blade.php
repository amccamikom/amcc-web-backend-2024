<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/icons/car.webp') }}" type="image/x-icon">
    <title>API Documentation - Car Rental</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            /* slate-50 */
        }

        pre[class*="language-"] {
            font-family: 'JetBrains Mono', monospace;
            border-radius: 0.5rem;
            padding: 1.25rem !important;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        .method-get {
            background-color: #16a34a;
        }

        .method-post {
            background-color: #2563eb;
        }

        .method-put {
            background-color: #f59e0b;
        }

        .method-delete {
            background-color: #dc2626;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <main class="flex min-h-screen">
        <aside
            class="w-1/4 min-w-[280px] max-w-[320px] bg-white border-r border-slate-200 p-6 fixed top-0 left-0 h-full overflow-y-auto">
            <a href="{{ route('home') }}">
                <h1 class="text-2xl font-bold text-teal-700">Car Rental API</h1>
            </a>
            <p class="text-sm text-slate-500 mt-1">Dokumentasi API v1</p>
            <nav class="mt-8">
                <ul>
                    <li>
                        <h2 class="text-sm font-semibold text-slate-400 uppercase tracking-wider mb-2">Introduction</h2>
                        <ul class="space-y-1">
                            <li><a href="#introduction"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Selamat
                                    Datang</a></li>
                            <li><a href="#setup"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Panduan
                                    Setup</a></li>
                        </ul>
                    </li>
                    <li class="mt-8">
                        <h2 class="text-sm font-semibold text-slate-400 uppercase tracking-wider mb-2">🚗 Cars</h2>
                        <ul class="space-y-1">
                            <li><a href="#cars-popular"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Get
                                    Popular Cars</a></li>
                            <li><a href="#cars-search"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Search
                                    Cars by Location</a></li>
                            <li><a href="#cars-get-by-id"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Get Car by
                                    ID</a></li>
                        </ul>
                    </li>
                    <li class="mt-8">
                        <h2 class="text-sm font-semibold text-slate-400 uppercase tracking-wider mb-2">🧾 Bookings</h2>
                        <ul class="space-y-1">
                            <li><a href="#bookings-get-all"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Get All
                                    User Bookings</a></li>
                            <li><a href="#bookings-get-single"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Get Single
                                    Booking</a></li>
                            <li><a href="#bookings-create"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Create New
                                    Booking</a></li>
                            <li><a href="#bookings-update"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Update
                                    Booking</a></li>
                            <li><a href="#bookings-delete"
                                    class="block text-slate-600 hover:text-teal-600 hover:font-semibold py-1">Delete /
                                    Cancel Booking</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <section class="w-3/4 ml-[25%] p-8 md:p-12">
            <div class="max-w-4xl mx-auto">

                <section id="introduction" class="mb-16">
                    <h2 class="text-4xl font-bold text-slate-900 border-b-2 border-teal-500 pb-4">Selamat Datang</h2>
                    <p class="mt-4 text-lg text-slate-600">Ini adalah dokumentasi resmi untuk <strong>Car Rental
                            API</strong>. Proyek backend ini dibuat menggunakan Laravel dan menyediakan RESTful API
                        untuk mengelola data mobil dan pesanan (booking).</p>
                    <div class="mt-6 p-4 bg-teal-50 border border-teal-200 rounded-lg">
                        <h4 class="font-semibold text-teal-800">Fitur Utama:</h4>
                        <ul class="list-disc list-inside mt-2 text-teal-700 space-y-1">
                            <li>Menampilkan daftar mobil populer yang tersedia.</li>
                            <li>Membuat pesanan/booking mobil baru.</li>
                            <li>Melihat riwayat pesanan berdasarkan nomor telepon.</li>
                            <li>Mengubah dan membatalkan pesanan.</li>
                            <li>Update status ketersediaan mobil secara otomatis.</li>
                        </ul>
                    </div>
                </section>

                <section id="setup" class="mb-16">
                    <h2 class="text-3xl font-bold text-slate-900 border-b-2 border-teal-500 pb-4">Panduan Setup Awal
                    </h2>
                    <p class="mt-4 text-slate-600">Ikuti langkah-langkah berikut untuk menjalankan proyek ini di
                        komputermu. Pastikan kamu sudah menginstall PHP, Composer, dan MySQL.</p>
                    <ol class="list-decimal list-inside mt-4 space-y-4">
                        <li>
                            <strong>Clone repository:</strong>
                            <pre><code class="language-bash">git clone https://github.com/amccamikom/amcc-web-backend-2024.git
cd amcc-web-backend-2024</code></pre>
                        </li>
                        <li>
                            <strong>Install dependensi:</strong>
                            <pre><code class="language-bash">composer install</code></pre>
                        </li>
                        <li>
                            <strong>Setup file environment:</strong> Salin <code>.env.example</code> menjadi
                            <code>.env</code> dan konfigurasikan databasemu.
                            <pre><code class="language-bash">cp .env.example .env
php artisan key:generate</code></pre>
                        </li>
                        <li>
                            <strong>Jalankan migrasi dan seeder:</strong>
                            <pre><code class="language-bash">php artisan migrate:fresh --seed</code></pre>
                        </li>
                        <li>
                            <strong>Jalankan server:</strong> API akan berjalan di <code>http://127.0.0.1:8000</code>.
                            <pre><code class="language-bash">php artisan serve</code></pre>
                        </li>
                    </ol>
                    <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <p class="text-blue-800">Semua endpoint memiliki prefix <code>/api/v1</code>. Jadi, Base URL
                            saat development adalah: <br><strong
                                class="font-mono bg-blue-100 px-2 py-1 rounded">http://127.0.0.1:8000/api/v1</strong>
                        </p>
                    </div>
                </section>

                <div class="my-16 border-t border-slate-200"></div>

                <div>
                    <h2 class="text-4xl font-bold text-slate-900">🚗 Cars API</h2>

                    <article id="cars-popular" class="mt-12">
                        <h3 class="text-2xl font-semibold text-slate-800">Get Popular Cars</h3>
                        <p class="mt-2 text-slate-600">Mengambil daftar mobil populer yang tersedia, diurutkan
                            berdasarkan rating tertinggi.</p>
                        <div class="mt-4 flex items-center gap-4 p-3 bg-slate-100 rounded-lg">
                            <span class="method-get text-white text-sm font-bold px-3 py-1 rounded-full">GET</span>
                            <code class="text-slate-800 font-mono">/cars/popular</code>
                        </div>
                        <h4 class="mt-6 font-semibold">Contoh Response Sukses (200)</h4>
                        <pre><code class="language-json">{
    "message": "Popular cars retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Toyota Avanza G",
            "color": "Silver",
            "price": 350000,
            "speed": 200,
            "seats": 7,
            "location": "Jakarta",
            "rating": 4.8,
            "is_available": true,
            "created_at": "2025-06-11T17:00:00.000000Z",
            "updated_at": "2025-06-11T17:00:00.000000Z"
        }
    ]
}</code></pre>
                    </article>

                    <article id="cars-search" class="mt-12">
                        <h3 class="text-2xl font-semibold text-slate-800">Search Cars by Location</h3>
                        <p class="mt-2 text-slate-600">Mencari mobil yang tersedia berdasarkan lokasi.</p>
                        <div class="mt-4 flex items-center gap-4 p-3 bg-slate-100 rounded-lg">
                            <span class="method-post text-white text-sm font-bold px-3 py-1 rounded-full">POST</span>
                            <code class="text-slate-800 font-mono">/cars/search</code>
                        </div>
                        <h4 class="mt-6 font-semibold">Request Body</h4>
                        <pre><code class="language-json">{
    "location": "Jakarta"
}</code></pre>
                        <h4 class="mt-6 font-semibold">Contoh Response Gagal (404)</h4>
                        <pre><code class="language-json">{
    "message": "No cars found in this location"
}</code></pre>
                    </article>

                    <article id="cars-get-by-id" class="mt-12">
                        <h3 class="text-2xl font-semibold text-slate-800">Get Car by ID</h3>
                        <p class="mt-2 text-slate-600">Mendapatkan detail satu mobil berdasarkan ID-nya.</p>
                        <div class="mt-4 flex items-center gap-4 p-3 bg-slate-100 rounded-lg">
                            <span class="method-post text-white text-sm font-bold px-3 py-1 rounded-full">POST</span>
                            <code class="text-slate-800 font-mono">/cars</code>
                        </div>
                        <h4 class="mt-6 font-semibold">Request Body</h4>
                        <pre><code class="language-json">{
    "id": 1
}</code></pre>
                        <h4 class="mt-6 font-semibold">Contoh Response Sukses (200)</h4>
                        <pre><code class="language-json">{
    "message": "Car data retrieved successfully",
    "data": {
        "id": 1,
        "name": "Toyota Avanza G",
        "color": "Silver",
        "price": 350000,
        "speed": 200,
        "seats": 7,
        "location": "Jakarta",
        "rating": 4.8,
        "is_available": true,
        "created_at": "2025-06-11T17:00:00.000000Z",
        "updated_at": "2025-06-11T17:00:00.000000Z"
    }
}</code></pre>
                    </article>
                </div>

                <div class="my-16 border-t border-slate-200"></div>

                <div>
                    <h2 class="text-4xl font-bold text-slate-900">🧾 Bookings API</h2>

                    <article id="bookings-get-all" class="mt-12">
                        <h3 class="text-2xl font-semibold text-slate-800">Get All User Bookings</h3>
                        <p class="mt-2 text-slate-600">Mendapatkan semua riwayat pesanan seorang pengguna berdasarkan
                            nomor telepon.</p>
                        <div class="mt-4 flex items-center gap-4 p-3 bg-slate-100 rounded-lg">
                            <span class="method-post text-white text-sm font-bold px-3 py-1 rounded-full">POST</span>
                            <code class="text-slate-800 font-mono">/bookings/all</code>
                        </div>
                        <h4 class="mt-6 font-semibold">Request Body</h4>
                        <pre><code class="language-json">{
    "user_phone": "081234567890"
}</code></pre>
                        <h4 class="mt-6 font-semibold">Contoh Response Sukses (200)</h4>
                        <pre><code class="language-json">{
    "message": "User bookings retrieved successfully",
    "data": [
        {
            "id": "MBX1Y2Z3A4",
            "car_id": 5,
            "user_phone": "081234567890",
            "...": "...",
            "car": {
                "id": 5,
                "name": "Toyota Avanza G",
                "...": "..."
            }
        }
    ]
}</code></pre>
                    </article>

                    <article id="bookings-get-single" class="mt-12">
                        <h3 class="text-2xl font-semibold text-slate-800">Get Single Booking</h3>
                        <p class="mt-2 text-slate-600">Mengambil data satu booking berdasarkan ID booking dan
                            (opsional) nomor telepon user.</p>
                        <div class="mt-4 flex items-center gap-4 p-3 bg-slate-100 rounded-lg">
                            <span class="method-post text-white text-sm font-bold px-3 py-1 rounded-full">POST</span>
                            <code class="text-slate-800 font-mono">/bookings/user</code>
                        </div>
                        <h4 class="mt-6 font-semibold">Request Body</h4>
                        <pre><code class="language-json">{
    "id": "MBX1Y2Z3A4",
    "user_phone": "081234567890" // opsional
}</code></pre>
                    </article>

                    <article id="bookings-create" class="mt-12">
                        <h3 class="text-2xl font-semibold text-slate-800">Create New Booking</h3>
                        <p class="mt-2 text-slate-600">Membuat pesanan mobil baru. Status ketersediaan mobil akan
                            otomatis ter-update.</p>
                        <div class="mt-4 flex items-center gap-4 p-3 bg-slate-100 rounded-lg">
                            <span class="method-post text-white text-sm font-bold px-3 py-1 rounded-full">POST</span>
                            <code class="text-slate-800 font-mono">/bookings</code>
                        </div>
                        <h4 class="mt-6 font-semibold">Request Body</h4>
                        <pre><code class="language-json">{
    "car_id": 1,
    "duration_days": 3,
    "booking_date": "2025-06-15",
    "user_name": "Asep Bensin",
    "user_email": "asep.bensin@example.com",
    "user_phone": "081234567890"
}</code></pre>
                        <h4 class="mt-6 font-semibold">Contoh Response Sukses (201)</h4>
                        <pre><code class="language-json">{
    "message": "Booking created successfully",
    "data": {
        "id": "MBK9L8J7H6",
        "car_id": 1,
        "duration_days": 3,
        "...": "..."
    }
}</code></pre>
                        <h4 class="mt-6 font-semibold">Contoh Response Gagal (400)</h4>
                        <pre><code class="language-json">{
    "message": "Car is not available for booking"
}</code></pre>
                    </article>

                    <article id="bookings-update" class="mt-12">
                        <h3 class="text-2xl font-semibold text-slate-800">Update Booking</h3>
                        <p class="mt-2 text-slate-600">Mengubah detail pesanan yang sudah ada berdasarkan ID. Semua
                            field bersifat opsional.</p>
                        <div class="mt-4 flex items-center gap-4 p-3 bg-slate-100 rounded-lg">
                            <span class="method-put text-white text-sm font-bold px-3 py-1 rounded-full">PUT</span>
                            <code class="text-slate-800 font-mono">/bookings/{id}</code>
                        </div>
                        <h4 class="mt-6 font-semibold">URL Parameter</h4>
                        <p class="text-slate-600"><code>{id}</code>: ID unik dari booking (contoh:
                            <code>MBX1Y2Z3A4</code>)
                        </p>
                        <h4 class="mt-6 font-semibold">Request Body (Contoh)</h4>
                        <pre><code class="language-json">{
    "duration_days": 5,
    "booking_date": "2025-06-16"
}</code></pre>
                    </article>

                    <article id="bookings-delete" class="mt-12">
                        <h3 class="text-2xl font-semibold text-slate-800">Delete / Cancel Booking</h3>
                        <p class="mt-2 text-slate-600">Menghapus/membatalkan pesanan. Status mobil yang bersangkutan
                            akan kembali menjadi tersedia (available).</p>
                        <div class="mt-4 flex items-center gap-4 p-3 bg-slate-100 rounded-lg">
                            <span
                                class="method-delete text-white text-sm font-bold px-3 py-1 rounded-full">DELETE</span>
                            <code class="text-slate-800 font-mono">/bookings/{id}</code>
                        </div>
                        <h4 class="mt-6 font-semibold">URL Parameter</h4>
                        <p class="text-slate-600"><code>{id}</code>: ID unik dari booking (contoh:
                            <code>MBX1Y2Z3A4</code>)
                        </p>
                        <h4 class="mt-6 font-semibold">Contoh Response Sukses (200)</h4>
                        <pre><code class="language-json">{
    "message": "Booking deleted successfully"
}</code></pre>
                        <h4 class="mt-6 font-semibold">Contoh Response Gagal (404)</h4>
                        <pre><code class="language-json">{
    "message": "Booking not found"
}</code></pre>
                    </article>
                </div>

            </div>
        </section>
    </main>
</body>

</html>
