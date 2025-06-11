# Car Rental API

Ini adalah repository untuk backend API Sistem Rental Mobil. Dibuat menggunakan **Laravel 12**, proyek ini menyediakan RESTful API untuk mengelola data mobil dan pesanan (booking) dari sisi server.

## ✨ Fitur Utama

-   Menampilkan daftar mobil populer yang tersedia.
-   Membuat pesanan/booking mobil baru dengan ID unik (contoh: `MB-XXXXXXXXXX`).
-   Melihat riwayat pesanan berdasarkan email user.
-   Mengubah dan membatalkan pesanan.
-   Update status ketersediaan mobil secara otomatis saat mobil dipesan atau pesanan dibatalkan.

## 🛠️ Teknologi yang Digunakan

-   **Backend:** Laravel 12
-   **Database:** MySQL

## 🚀 Panduan Setup Awal

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokalmu.

### Prasyarat

-   PHP 8.2 atau lebih baru
-   Composer
-   Database MySQL
-   Git
-   Postman (Opsional)

### Langkah-langkah Instalasi

1.  **Clone repository ini:**
    ```bash
    git clone https://github.com/amccamikom/amcc-web-backend-2024.git
    cd amcc-web-backend-2024
    git checkout branch create-booking-endpoint
    ```

2.  **Install dependensi PHP via Composer:**
    ```bash
    composer install
    ```

3.  **Salin file environment:**
    ```bash
    cp .env.example .env
    ```

4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi database:**
    Buka file `.env` dan sesuaikan pengaturan database sesuai dengan konfigurasimu.
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=car_rental
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Jalankan migrasi dan seeder:**
    Perintah ini akan membuat semua tabel yang dibutuhkan dan mengisinya dengan data awal (dummy data) yang sudah kita siapkan.
    ```bash
    php artisan migrate:fresh --seed
    ```

7.  **Jalankan server pengembangan:**
    ```bash
    php artisan serve
    ```
    Sekarang, API-mu sudah berjalan dan bisa diakses di `http://127.0.0.1:8000`.

## 📚 Dokumentasi API Endpoint

Semua endpoint di bawah ini memiliki prefix `/api/v1`.
**Base URL:** `http://127.0.0.1:8000/api/v1`

### 🚗 Cars

#### Get Popular Cars

Mengambil daftar mobil populer yang tersedia untuk disewa (diurutkan berdasarkan rating tertinggi).

-   **Method:** `GET`
-   **Endpoint:** `/cars/popular`
-   **Response Sukses (200):**
    ```json
    {
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
    }
    ```

### 🧾 Bookings

#### Get User Booking

Mengambil data booking berdasarkan ID booking dan (opsional) nomor telepon user.

-   **Method:** `POST`
-   **Endpoint:** `/bookings/user`
-   **Request Body:**
    ```json
    {
        "id": "MBX1Y2Z3A4",
        "user_phone": "081234567890" // opsional
    }
    ```
    -   `id` wajib, `user_phone` opsional.
-   **Response Sukses (200):**
    ```json
    {
        "message": "User booking retrieved successfully",
        "data": {
            "id": "MBX1Y2Z3A4",
            "car_id": 5,
            "duration_days": 3,
            "booking_date": "2025-06-10",
            "user_name": "Salman",
            "user_email": "salman@example.com",
            "user_phone": "081234567890",
            "created_at": "2025-06-11T17:00:00.000000Z",
            "updated_at": "2025-06-11T17:00:00.000000Z",
            "car": {
                "id": 5,
                "name": "Toyota Avanza G",
                // ...data mobil lainnya...
            }
        }
    }
    ```
-   **Response Gagal (404):**
    ```json
    {
        "message": "Booking not found"
    }
    ```

#### Create New Booking

Membuat pesanan mobil baru.

-   **Method:** `POST`
-   **Endpoint:** `/bookings`
-   **Request Body:**
    ```json
    {
        "car_id": 1,
        "duration_days": 3,
        "booking_date": "2025-06-15",
        "user_name": "Asep Bensin",
        "user_email": "asep.bensin@example.com",
        "user_phone": "081234567890"
    }
    ```
-   **Response Sukses (201):**
    ```json
    {
        "message": "Booking created successfully",
        "data": {
            "id": "MBK9L8J7H6",
            "car_id": 1,
            "duration_days": 3,
            "booking_date": "2025-06-15",
            "user_name": "Asep Bensin",
            "user_email": "asep.bensin@example.com",
            "user_phone": "081234567890",
            "created_at": "2025-06-11T17:00:00.000000Z",
            "updated_at": "2025-06-11T17:00:00.000000Z"
        }
    }
    ```
-   **Response Gagal (400):**
    ```json
    {
        "message": "Car is not available for booking"
    }
    ```

#### Update Booking

Mengubah detail pesanan yang sudah ada. Semua field opsional.

-   **Method:** `PUT`
-   **Endpoint:** `/bookings/{id}`
-   **URL Parameter:**
    -   `{id}`: ID unik dari booking (contoh: `MBX1Y2Z3A4`).
-   **Request Body:**
    ```json
    {
        "duration_days": 5,
        "booking_date": "2025-06-16"
        // field lain opsional: car_id, user_name, user_email, user_phone
    }
    ```
-   **Response Sukses (200):**
    ```json
    {
        "message": "Booking updated successfully",
        "data": {
            "id": "MBX1Y2Z3A4",
            "car_id": 5,
            "duration_days": 5,
            "booking_date": "2025-06-16",
            "user_name": "Salman",
            "user_email": "salman@example.com",
            "user_phone": "081234567890",
            "created_at": "2025-06-11T17:00:00.000000Z",
            "updated_at": "2025-06-11T17:01:00.000000Z"
        }
    }
    ```
-   **Response Gagal (404):**
    ```json
    {
        "message": "Booking not found"
    }
    ```

#### Delete / Cancel Booking

Menghapus data pesanan. Status mobil terkait akan otomatis menjadi available.

-   **Method:** `DELETE`
-   **Endpoint:** `/bookings/{id}`
-   **URL Parameter:**
    -   `{id}`: ID unik dari booking (contoh: `MBX1Y2Z3A4`).
-   **Response Sukses (200):**
    ```json
    {
        "message": "Booking deleted successfully"
    }
    ```
-   **Response Gagal (404):**
    ```json
    {
        "message": "Booking not found"
    }
    ```