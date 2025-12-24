

# 🚀 Jurnalku Mobile - Siswa Directory & Portfolio

**Jurnalku** adalah aplikasi manajemen portofolio dan direktori siswa SMK Wikrama Bogor. Proyek ini dibangun menggunakan **Laravel 12** sebagai API Backend dan **Flutter** sebagai antarmuka Mobile Client.

---

## 📊 Dokumentasi ERD & Schema Database

Bagian ini menjelaskan struktur data yang digunakan dalam sistem. Database dirancang menggunakan relasi *One-to-Many* yang berpusat pada tabel `users`.

### Struktur Tabel (SQL)

Berikut adalah skema tabel yang digunakan dalam database SQL:

```sql
-- Tabel Utama: Users
CREATE TABLE `users`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nis` VARCHAR(255) NOT NULL UNIQUE,
    `name` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `rombel` VARCHAR(255) NOT NULL,
    `rayon` VARCHAR(255) NOT NULL,
    `photo` VARCHAR(255) NOT NULL, -- Berisi 'none' atau path file
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);

-- Tabel Portofolio (Relasi ke Users)
CREATE TABLE `portfolios`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `duration` VARCHAR(255) NOT NULL,
    `portfolio_link` VARCHAR(255) NULL, -- Nullable
    `image` VARCHAR(255) NULL,          -- Nullable
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL,
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
);

-- Tabel Sertifikat (Relasi ke Users)
CREATE TABLE `certificates`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `file` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL,
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
);

-- Tabel Sosial Media (Relasi ke Users)
CREATE TABLE `social_links`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `platform` VARCHAR(255) NOT NULL, -- Contoh: Instagram, GitHub
    `url` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL,
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
);

-- Tabel Dokumen Tambahan (Relasi ke Users)
CREATE TABLE `documents`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NOT NULL,
    `curriculum_vitae` VARCHAR(255) NOT NULL,
    `student_card` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL,
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
);

```

### Relasi Antar Tabel:

1. **Users ↔ Portfolios**: Seorang siswa dapat memiliki banyak karya portofolio.
2. **Users ↔ Certificates**: Seorang siswa dapat mengunggah banyak sertifikat keahlian.
3. **Users ↔ Social Links**: Menghubungkan profil siswa ke berbagai platform media sosial.
4. **Users ↔ Documents**: Menyimpan dokumen administratif siswa (CV & Kartu Pelajar).

---

## 📂 Dokumentasi API (Endpoints)

### 1. Autentikasi & Session

* **Login**: Memvalidasi NIS dan Password.
* **Session**: Setelah login, sistem memanfaatkan session untuk menarik `user_id` yang aktif. ID ini digunakan untuk menentukan data mana yang akan ditampilkan pada halaman profil pengguna.

### 2. Explore (Daftar Siswa)

* **URL**: `GET /api/users`
* **Akses**: Umum (Login/Unlogin)
* **Fungsi**: Menampilkan ringkasan seluruh siswa untuk fitur pencarian.

### 3. Detail Profil & Pengaturan

* **Get Profile**: `GET /api/users/{nis}`. Menampilkan data lengkap relasi (Portofolio, Sertifikat, Social Links) berdasarkan NIS.
* **Fetch Settings**: Digunakan untuk menarik data awal (id, name, dll) ke dalam form pengaturan akun agar pengguna dapat memperbarui data mereka.

---

## ⚙️ Cara Pemasangan

### Backend (Laravel 12)

1. `composer install`
2. Konfigurasi `.env` (Sesuaikan `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
3. `php artisan key:generate`
4. `php artisan migrate --seed` (Menjalankan skema database di atas).
5. `php artisan serve --host=0.0.0.0`

### Mobile (Flutter)

1. `flutter pub get`
2. Buka konfigurasi API, ganti `baseUrl` ke IP Laptop Anda (misal: `http://192.168.1.xx:8000/api`).
3. `flutter run`

---

## 💡 Catatan Implementasi Flutter

* **Handling Null**: Field `portfolio_link` dan `image` pada tabel portofolio bersifat `nullable`. Pastikan Flutter memiliki logika *fallback* (menampilkan placeholder) jika data bernilai null.
* **Formatting**: Data `rombel` dan `rayon` dari database (kebab-case) diformat di sisi UI menjadi Uppercase untuk estetika.

---

Apakah Anda ingin saya membantu membuatkan **Script Seeder** yang sesuai dengan struktur SQL di atas agar database Anda langsung terisi data contoh yang rapi?
