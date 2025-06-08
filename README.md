# ITSB One – Sistem Informasi Akademik

ITSB One adalah platform berbasis Laravel yang dirancang untuk mengelola kegiatan akademik seperti manajemen dosen, mahasiswa, jadwal kuliah, serta otentikasi pengguna.

---

## 🚀 Fitur Utama

- Manajemen dosen dan mahasiswa
- Modul jadwal kuliah
- Autentikasi pengguna dengan sistem peran (role)
- UI dengan Tailwind CSS dan Laravel Blade
- Frontend build menggunakan Vite

---

## 🛠️ Teknologi yang Digunakan

- **PHP 8+**
- **Laravel 11**
- **MySQL / MariaDB**
- **Vite** – Modul bundler modern
- **Tailwind CSS** – Utility-first CSS framework
- **Node.js & npm** – Untuk frontend build

---

## ⚙️ Cara Instalasi

### 1. Clone repositori

```bash
git clone https://github.com/akhdansh1/itsb-one-cadangan.git
cd itsb-one-cadangan

### 2. Install dependency backend & frontend
composer install
npm install && npm run build

### 3. Buat file konfigurasi environment
cp .env.example .env
php artisan key:generate

### 4. Buat file konfigurasi environment
cp .env.example .env
php artisan key:generate

### 5. Atur koneksi database
Edit file .env dan sesuaikan nilai berikut:
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

### 6. Jalankan aplikasi
php artisan serve
Akses aplikasi melalui: http://localhost:8000

🧱 Struktur Proyek
app/ – Logika utama aplikasi

routes/web.php – Routing web

resources/views/ – Tampilan (Blade templates)

public/ – File publik (gambar, JS, CSS)

database/ – File migrasi & seed

config/ – Konfigurasi sistem

.env – Konfigurasi environment

composer.json – Dependency PHP

package.json – Dependency JavaScript

⚙️ Teknologi
PHP 8+

Laravel 11

MySQL / MariaDB

Tailwind CSS

Vite (build tool)

Node.js & NPM

🔐 Fitur Autentikasi
ITSB One mendukung sistem login bawaan Laravel dengan validasi serta peran pengguna (roles). Komponen Blade kustom seperti form, button, dan validasi error telah disiapkan di folder resources/views/components.

🧪 Testing
Gunakan perintah berikut untuk menjalankan pengujian (jika tersedia):
php artisan test
