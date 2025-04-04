-- =====================================================
-- 1. DDL (Data Definition Language)
-- =====================================================

-- a. Create Database dan gunakan database tersebut
CREATE DATABASE school;
USE school;

-- b. Buat tabel-tabel tanpa foreign key terlebih dahulu

-- Tabel students
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
    student_id INT,  -- nantinya menjadi foreign key ke students(id)
    address TEXT,
    phone VARCHAR(20)
);

-- Tabel grades (untuk relasi 1:many: satu student dapat memiliki banyak nilai)
CREATE TABLE grades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,  -- nantinya menjadi foreign key ke students(id)
    subject VARCHAR(50),
    grade VARCHAR(2)
);

-- Tabel courses (untuk relasi many:many: satu student dapat mengikuti banyak course dan sebaliknya)
CREATE TABLE courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_name VARCHAR(100) NOT NULL
);

-- Tabel student_courses (junction table untuk many:many)
CREATE TABLE student_courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    course_id INT
);

-- c. ALTER TABLE: Menambahkan kolom 'status' sudah dilakukan di tabel students di atas.
ALTER TABLE students ADD COLUMN status VARCHAR(20) DEFAULT 'active';

-- d. DROP TABLE: Contoh latihan menghapus tabel grades, kemudian dibuat ulang
DROP TABLE grades;

CREATE TABLE grades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    subject VARCHAR(50),
    grade VARCHAR(2)
);


-- =====================================================
-- 2. DML (Data Manipulation Language)
-- =====================================================

-- a. INSERT Data ke tabel students
INSERT INTO students (name, email, age, city, status) VALUES
('Agus', 'agus@gmail.com', 16, 'Jakarta', 'active'),
('Heru', 'heru@gmail.com', 17, 'Bandung', 'inactive'),
('Ujang', 'ujang@gmail.com', 15, 'Surabaya', 'active');

-- b. INSERT Data ke tabel student_profiles (relasi 1:1)
INSERT INTO student_profiles (student_id, address, phone) VALUES
(1, 'Jl. Merdeka No. 10, Jakarta', '081234567890'),
(2, 'Jl. Asia Afrika No. 20, Bandung', '082345678901'),
(3, 'Jl. Pahlawan No. 30, Surabaya', '083456789012');

-- c. INSERT Data ke tabel grades (relasi 1:many)
INSERT INTO grades (student_id, subject, grade) VALUES
(1, 'Matematika', 'A'),
(1, 'Bahasa Inggris', 'B'),
(2, 'Matematika', 'B'),
(3, 'Bahasa Indonesia', 'A');

-- d. INSERT Data ke tabel courses
INSERT INTO courses (course_name) VALUES
('Ilmu Pengetahuan Alam'),
('Ilmu Pengetahuan Sosial'),
('Bahasa Inggris');

-- e. INSERT Data ke tabel student_courses (relasi many:many)
INSERT INTO student_courses (student_id, course_id) VALUES
(1, 1),  -- Agus mengikuti IPA
(1, 3),  -- Agus juga mengikuti Bahasa Inggris
(2, 2),  -- Heru mengikuti IPS
(3, 1);  -- Ujang mengikuti IPA

-- f. SELECT Data untuk menampilkan isi tabel
SELECT * FROM students;
SELECT * FROM student_profiles;
SELECT * FROM grades;
SELECT * FROM courses;
SELECT * FROM student_courses;

-- g. UPDATE Data pada tabel students (misalnya, ubah kota Heru)
UPDATE students
SET city = 'Yogyakarta'
WHERE id = 2;

-- h. DELETE Data pada tabel grades (misalnya, hapus nilai dengan id = 2)
DELETE FROM grades
WHERE id = 2;


-- =====================================================
-- 3. Operator
-- =====================================================

-- a. Operator Perbandingan: Menampilkan student dengan id > 1
SELECT * FROM students
WHERE id > 1;

-- b. Operator Logika: Menampilkan student yang tinggal di Jakarta atau Surabaya
SELECT * FROM students
WHERE city = 'Jakarta' OR city = 'Surabaya';

-- c. Operator Aritmatika: Menghitung umur + 1 sebagai usia tahun depan
SELECT name, age, age + 1 AS next_year_age
FROM students;

-- d. Operator LIKE: Menampilkan student dengan nama yang mengandung 'u'
SELECT * FROM students
WHERE name LIKE '%u%';

-- e. Operator IN dan BETWEEN:
SELECT * FROM students
WHERE city IN ('Jakarta', 'Bandung');

SELECT * FROM students
WHERE age BETWEEN 16 AND 17;


-- =====================================================
-- 4. Klausa (Clause)
-- =====================================================

-- a. WHERE: Menampilkan student yang statusnya 'active'
SELECT * FROM students
WHERE status = 'active';

-- b. ORDER BY: Menampilkan student berdasarkan usia secara descending
SELECT * FROM students
ORDER BY age DESC;

-- c. LIMIT: Menampilkan 2 student pertama
SELECT * FROM students
LIMIT 2;

-- d. JOIN: Menghubungkan data student dengan profile (relasi 1:1)
SELECT s.id, s.name, p.address, p.phone
FROM students s
JOIN student_profiles p ON s.id = p.student_id;

-- JOIN untuk relasi many:many (menampilkan student dan course yang diikuti)
SELECT s.name, c.course_name
FROM students s
JOIN student_courses sc ON s.id = sc.student_id
JOIN courses c ON sc.course_id = c.id;


-- =====================================================
-- 5. Relationship (Penggunaan Foreign Key & Cascade)
-- =====================================================

-- Menambahkan foreign key untuk relasi 1:1 antara student_profiles dan students
ALTER TABLE student_profiles
ADD FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE;

-- Menambahkan foreign key untuk relasi 1:many antara grades dan students
ALTER TABLE grades
ADD FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE;

-- Menambahkan foreign key untuk relasi many:many di student_courses antara students dan courses
ALTER TABLE student_courses
ADD FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE;

ALTER TABLE student_courses
ADD FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE;

-- Contoh: Hapus student dengan id = 3 untuk melihat efek cascading ke student_profiles, grades, dan student_courses
DELETE FROM students
WHERE id = 3;
