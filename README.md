

---

# 🚀 Jurnalku Mobile - Siswa Directory & Portfolio

**Jurnalku** adalah aplikasi manajemen portofolio dan direktori siswa SMK Wikrama Bogor. Proyek ini menghubungkan **Backend Laravel 12** sebagai penyedia API data siswa dengan **Flutter Mobile** sebagai antarmuka pengguna.

---

## 🛠️ Stack Teknologi

* **Backend:** Laravel 12 (PHP 8.2+)
* **Database:** SQL (MySQL/PostgreSQL)
* **Mobile:** Flutter 3.x
* **State Management:** Provider
* **Networking:** HTTP & Cached Network Image

---

## 📂 Dokumentasi API (Endpoints)

Backend menggunakan standar JSON RESTful. Data relasi (`portfolios`, `social_links`, `certificates`) dimuat secara otomatis menggunakan *Eager Loading* di Laravel.

### 1. Ambil Semua Siswa

* **URL:** `GET /api/users`
* **Deskripsi:** Mengambil daftar seluruh siswa untuk halaman Explore.
* **Struktur Response:**

```json
[
  {
    "id": 1,
    "name": "M. Reysha Nova A",
    "nis": "12309727",
    "rombel": "pplg-xii5",
    "rayon": "cicurug-9",
    "photo": "none",
    "portfolios": [
      {
        "title": "Sistem Jurnal PKL",
        "description": "Aplikasi untuk mencatat kegiatan harian PKL"
      }
    ],
    "social_links": [
      { "platform": "Instagram", "url": "..." },
      { "platform": "GitHub", "url": "..." }
    ]
  }
]

```

### 2. Ambil Detail Siswa (NIS)

* **URL:** `GET /api/users/{nis}`
* **Deskripsi:** Mengambil data spesifik satu siswa untuk halaman profil.

---

## ⚙️ Panduan Instalasi Backend (Laravel 12)

1. **Clone & Install:**
```bash
git clone <repository-url>
cd jurnalku-backend
composer install

```


2. **Environment:**
```bash
cp .env.example .env
php artisan key:generate

```


3. **Database Setup:**
Pastikan database SQL Anda sudah siap, lalu jalankan:
```bash
php artisan migrate --seed

```


4. **Menjalankan Server:**
```bash
php artisan serve --host=0.0.0.0 --port=8000

```



---

## ⚙️ Panduan Instalasi Mobile (Flutter)

1. **Install Package:**
```bash
flutter pub get

```


2. **Konfigurasi API:**
Ubah `baseUrl` pada kode Flutter Anda agar mengarah ke IP Server Laravel:
* **Emulator:** `http://10.0.2.2:8000/api`
* **Local Network:** `http://192.168.x.x:8000/api`


3. **Run:**
```bash
flutter run

```



---

## 💡 Catatan Implementasi Flutter

Berdasarkan data JSON Anda, terdapat beberapa hal yang perlu diperhatikan pada sisi Flutter:

1. **Format Teks:** Data `rombel` (`pplg-xii5`) dan `rayon` (`cicurug-9`) dikirim dalam format *lowercase-kebab*. Di Flutter, gunakan `.toUpperCase().replaceAll('-', ' ')` untuk tampilan yang lebih rapi (contoh: **PPLG XII 5**).
2. **Handling Null:**
* `photo: "none"`: Jika "none", aplikasi secara otomatis menampilakan **UI Avatars** berdasarkan nama siswa.
* `portfolios: []`: Jika array kosong, aplikasi akan menampilkan pesan "Belum ada portofolio".


3. **Keamanan:** Gunakan `nis` sebagai kunci pencarian yang unik pada endpoint detail.

---

## 📸 Fitur Saat Ini

* [x] **API Integration:** Penarikan data real-time dari Laravel 12.
* [x] **Smart Filter:** Filter berdasarkan Rombel, Rayon, dan Jurusan secara dinamis.
* [x] **Portfolio Tracking:** Menampilkan jumlah proyek dan sertifikat yang dimiliki tiap siswa.
* [x] **Social Links:** Integrasi link media sosial siswa ke browser/aplikasi eksternal.

---

### Tips Tambahan untuk Anda:

Karena Anda menggunakan **Laravel 12**, pastikan pada `UserController.php` Anda sudah menggunakan `with([...])` agar data `portfolios` dan `social_links` tidak bernilai kosong (`[]`) saat dipanggil oleh Flutter.

Apakah Anda ingin saya membantu membuatkan **Seeder** di Laravel agar data dummy Anda (seperti "Pentol Kuda" atau "M. Reysha") bisa langsung masuk ke database dengan satu perintah?
