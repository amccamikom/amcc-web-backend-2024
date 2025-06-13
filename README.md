# 📝 Pertemuan 9: Refactor ke Eloquent - Bikin Kode Jadi Elegan

welkom bek! Setelah sebelumnya kita mahir mengelola `Controller` dan `Request`, sekarang waktunya kita 'merenovasi' fondasi aplikasi kita. Kita akan beralih dari **Query Builder** yang manual ke **Eloquent ORM** yang lebih elegann. Sesi ini kita fokus pada *refactoring*: mengubah kode yang sudah ada menjadi lebih bersih, lebih aman, dan lebih profesional.

## 🎯 Tujuan Pertemuan

Pada pertemuan ini, peserta diharapkan dapat:

- Memahami perbedaan fundamental antara Query Builder dan Eloquent ORM.
- Mampu mengonfigurasi **Model** dengan properti `$fillable` dan mendefinisikan **relasi**.
- Melakukan **refactoring** kode dari Query Builder ke Eloquent untuk semua operasi CRUD.
- Menerapkan *best practice* seperti *Eager Loading* (`with()`) untuk optimasi performa.

## 📚 Materi yang Dibahas

1.  **Konfigurasi Model:** Keamanan dengan `$fillable` dan pembersihan logika query.
2.  **Definisi Relasi:** Memetakan skema DB ke method Eloquent (`hasMany`, `belongsTo`).
3.  **Refactoring Controller:** Mengganti `DB::table()` dengan method Eloquent yang modern.
4.  **Best Practice:** *Eager Loading* dan *error handling* dengan `findOrFail()`.

## 💻 Tugas Praktikum

1.  **Konfigurasi Model:** Isi properti `$fillable` di semua model (`User`, `Car`, dll.) dan hapus logika Query Builder dari `User.php`.
2.  **Definisi Relasi:** Buat semua method relasi (`hasMany`, `belongsTo`, `hasOne`) di dalam setiap model sesuai skema.
3.  **Refactor Controller:** Ganti semua query `DB::table()` di `UserController`, `CarController`, `BookingController`, dan `TransactionController` dengan method Eloquent.
4.  **Testing:** Pastikan semua endpoint API berfungsi normal kembali menggunakan Postman.

## 📥 Link Modul
[Pertemuan 8 Eloquent ORM & Relationship ](https://medium.com/amcc-amikom/web-programming/home)

## 🌟 Harapan Kami

Di akhir sesi ini, kamu akan melihat bukti nyata bahwa 'progress' bukan hanya tentang menambah fitur, tapi juga tentang meningkatkan kualitas kode. Kemampuan untuk melakukan refactoring secara efektif adalah tanda seorang developer yang matang. Kode yang bersih akan membuat hidupmu lebih mudah di masa depan. Semangat bersih-bersih kode! 💻✨