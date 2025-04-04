# 📝 Belajar MySQL: Dari DDL ke Relationship

Halo sobat database! Di README ini, kita bakal ngebahas dasar-dasar MySQL yang wajib teman-teman kuasai untuk ngulik data. Mulai dari pembuatan database, tabel, manipulasi data, sampai ke relasi antar tabel. Santai aja, kita ngobrol kayak temen ngobrol, tapi jangan salah, isinya dalem banget!

## 🎯 Tujuan Pembelajaran

Di sesi ini, teman-teman bakal:

-   Paham konsep **Data Definition Language (DDL)** buat bikin database & tabel.
-   Mengerti **Data Manipulation Language (DML)** buat ngisi data dan manipulasi isinya.
-   Ngulik berbagai **Operator SQL** (perbandingan, logika, aritmatika, dll).
-   Kenal dan paham **Klausa SQL** kayak WHERE, ORDER BY, LIMIT, dan JOIN.
-   Menerapkan **Relationship** antar tabel pake foreign key dan cascading.

## 📚 Materi dan Contoh Kode

### 1. DDL (Data Definition Language)

Pertama-tama, kita bikin database dan tabel-tabel yang akan dipake. Kode di bawah ini bikin database `school` dan beberapa tabel:

```sql
-- Buat database dan gunakan database tersebut
CREATE DATABASE school;
USE school;

-- Buat tabel students
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    age INT,
    city VARCHAR(50)
);

-- Tabel student_profiles (untuk relasi 1:1 dengan students)
CREATE TABLE student_profiles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,  -- nanti jadi foreign key ke students(id)
    address TEXT,
    phone VARCHAR(20)
);

-- Tabel grades (untuk relasi 1:many, satu student bisa punya banyak nilai)
CREATE TABLE grades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,  -- nanti jadi foreign key ke students(id)
    subject VARCHAR(50),
    grade VARCHAR(2)
);

-- Tabel courses (untuk relasi many:many)
CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_name VARCHAR(100) NOT NULL
);

-- Tabel student_courses (junction table buat many:many)
CREATE TABLE student_courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    course_id INT
);

-- Tambah kolom 'status' ke tabel students
ALTER TABLE students ADD COLUMN status VARCHAR(20) DEFAULT 'active';

-- Contoh DROP TABLE, hapus tabel grades dan buat ulang
DROP TABLE grades;

CREATE TABLE grades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    subject VARCHAR(50),
    grade VARCHAR(2)
);
```

### 2. DML (Data Manipulation Language)

Setelah struktur database siap, saatnya ngisi data dan manipulasi isi tabel:

```sql
-- INSERT Data ke tabel students
INSERT INTO students (name, email, age, city, status) VALUES
('Agus', 'agus@gmail.com', 16, 'Jakarta', 'active'),
('Heru', 'heru@gmail.com', 17, 'Bandung', 'inactive'),
('Ujang', 'ujang@gmail.com', 15, 'Surabaya', 'active');

-- INSERT Data ke tabel student_profiles (relasi 1:1)
INSERT INTO student_profiles (student_id, address, phone) VALUES
(1, 'Jl. Merdeka No. 10, Jakarta', '081234567890'),
(2, 'Jl. Asia Afrika No. 20, Bandung', '082345678901'),
(3, 'Jl. Pahlawan No. 30, Surabaya', '083456789012');

-- INSERT Data ke tabel grades (relasi 1:many)
INSERT INTO grades (student_id, subject, grade) VALUES
(1, 'Matematika', 'A'),
(1, 'Bahasa Inggris', 'B'),
(2, 'Matematika', 'B'),
(3, 'Bahasa Indonesia', 'A');

-- INSERT Data ke tabel courses
INSERT INTO courses (course_name) VALUES
('Ilmu Pengetahuan Alam'),
('Ilmu Pengetahuan Sosial'),
('Bahasa Inggris');

-- INSERT Data ke tabel student_courses (relasi many:many)
INSERT INTO student_courses (student_id, course_id) VALUES
(1, 1),  -- Agus mengikuti IPA
(1, 3),  -- Agus juga mengikuti Bahasa Inggris
(2, 2),  -- Heru mengikuti IPS
(3, 1);  -- Ujang mengikuti IPA
```

### 3. Operator SQL

Untuk manipulasi data lebih lanjut, teman-teman bisa pake operator SQL buat filter, hitung, dan pencarian:

```sql
-- Operator Perbandingan: student dengan id > 1
SELECT * FROM students
WHERE id > 1;

-- Operator Logika: student yang tinggal di Jakarta atau Surabaya
SELECT * FROM students
WHERE city = 'Jakarta' OR city = 'Surabaya';

-- Operator Aritmatika: hitung umur + 1 sebagai usia tahun depan
SELECT name, age, age + 1 AS next_year_age
FROM students;

-- Operator LIKE: student dengan nama yang mengandung 'u'
SELECT * FROM students
WHERE name LIKE '%u%';

-- Operator IN dan BETWEEN
SELECT * FROM students
WHERE city IN ('Jakarta', 'Bandung');

SELECT * FROM students
WHERE age BETWEEN 16 AND 17;
```

### 4. Klausa SQL

Pahami penggunaan klausa untuk memfilter dan mengurutkan data:

```sql
-- WHERE: student yang statusnya 'active'
SELECT * FROM students
WHERE status = 'active';

-- ORDER BY: urutkan student berdasarkan usia secara descending
SELECT * FROM students
ORDER BY age DESC;

-- LIMIT: tampilkan 2 student pertama
SELECT * FROM students
LIMIT 2;

-- JOIN: gabungkan data student dengan profile (relasi 1:1)
SELECT s.id, s.name, p.address, p.phone
FROM students s
JOIN student_profiles p ON s.id = p.student_id;

-- JOIN untuk relasi many:many (tampilkan student dan course yang diikuti)
SELECT s.name, c.course_name
FROM students s
JOIN student_courses sc ON s.id = sc.student_id
JOIN courses c ON sc.course_id = c.id;
```

### 5. Relationship (Foreign Key & Cascade)

Terakhir, penting banget buat bikin relasi antar tabel agar data terjaga konsistensinya. Dengan menggunakan foreign key dan opsi cascading, setiap perubahan di tabel utama otomatis mempengaruhi tabel terkait.

```sql
-- Tambahkan foreign key untuk relasi 1:1 antara student_profiles dan students
ALTER TABLE student_profiles
ADD FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE;

-- Tambahkan foreign key untuk relasi 1:many antara grades dan students
ALTER TABLE grades
ADD FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE;

-- Tambahkan foreign key untuk relasi many:many di student_courses antara students dan courses
ALTER TABLE student_courses
ADD FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE;

ALTER TABLE student_courses
ADD FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE;

-- Contoh: Hapus student dengan id = 3 untuk melihat efek cascading ke student_profiles, grades, dan student_courses
DELETE FROM students
WHERE id = 3;
```

## 🌟 Tips Tambahan

-   **Eksperimen**: Jangan takut buat ngubah-ubah query. Coba hapus, tambahkan, dan modifikasi data untuk melihat langsung efeknya.
-   **Debugging**: Kalau ada error, cek syntax SQL teman-teman. Kadang masalahnya cuma typo atau urutan perintah yang kurang tepat.
-   **Cascade Power**: Fitur cascading itu powerful! Tapi ingat, gunakan dengan hati-hati biar gak kehapus data penting secara gak sengaja.

## 🚀 Harapan Kami

Semoga README ini bisa jadi panduan yang seru dan informatif buat teman-teman yang sedang mendalami MySQL. Belajar database itu penting banget, apalagi di era data-driven kayak sekarang. Jadi, terus eksplor dan jangan lupa enjoy proses belajarnya!

Happy coding dan semangat terus, bro/sis!
