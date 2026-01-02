# Portal Berita Sederhana

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

## Deskripsi Proyek

Portal Berita Sederhana adalah aplikasi web berbasis PHP yang dikembangkan sebagai studi kasus untuk Praktikum mata kuliah Pengembangan Aplikasi Web (PAW) 2025-2026. Aplikasi ini mensimulasikan alur kerja sebuah portal berita online dengan sistem manajemen konten yang mencakup berbagai role pengguna dan status artikel.

Proyek ini mendemonstrasikan implementasi konsep-konsep fundamental web development seperti autentikasi, otorisasi berbasis role, operasi CRUD, relasi database, dan pelaporan data.

## Fitur Utama

### Manajemen Pengguna

- **Sistem Autentikasi**: Login dengan username dan password
- **Role-Based Access Control**: 3 role pengguna (Pembaca, Penulis, Redaktur)
- **Password Hashing**: Keamanan password menggunakan SHA-256

### Manajemen Artikel

- **CRUD Operations**: Create, Read, Update, Delete artikel
- **Status Workflow**: Draft → Review → Published → Archived
- **Upload Gambar**: Fitur upload cover artikel
- **Kategorisasi**: Sistem many-to-many untuk kategori artikel
- **Search Functionality**: Pencarian artikel berdasarkan keyword

### Fitur Redaktur

- **Dashboard Redaktur**: Mengelola semua artikel
- **Review Artikel**: Approve/reject artikel dari penulis
- **Reporting**: Laporan jumlah artikel per kategori
- **Export Excel**: Export data laporan ke format Excel

## Teknologi yang Digunakan

- **Backend**: PHP (Native/Vanilla PHP)
- **Database**: MySQL dengan PDO (PHP Data Objects)
- **Frontend**: HTML5, CSS3
- **Server**: Laragon (Apache + MySQL)
- **Architecture**: Procedural PHP dengan pemisahan concern (MVC-like structure)

## Struktur Database

### Tabel Utama

**artikel**

- Menyimpan konten berita dengan status workflow
- Foreign key ke tabel pengguna (penulis & redaktur)
- Timestamps: created_at, updated_at, published_at

**pengguna**

- Menyimpan data user dengan role (pembaca, penulis, redaktur)
- Password terenkripsi dengan SHA-256

**kategori**

- Kategori berita (Teknologi, Ekonomi, Politik)

**artikel_kategori**

- Tabel junction untuk relasi many-to-many artikel dan kategori

## Instalasi

### Prasyarat

- Laragon atau XAMPP/WAMP
- PHP versi 7.4 atau lebih tinggi
- MySQL/MariaDB
- Git (untuk clone repository)
- Browser modern

### Langkah Instalasi

1. **Clone project dari GitHub**

   Buka terminal atau Git Bash, kemudian jalankan:

   ```bash
   cd C:\laragon\www
   git clone https://github.com/edi-mj/berita.git
   ```

   Atau jika sudah berada di direktori `C:\laragon\www`:

   ```bash
   git clone https://github.com/edi-mj/berita.git
   ```

   > **Catatan**: Jika Anda tidak menggunakan Git, Anda dapat download project sebagai ZIP dari GitHub dan ekstrak ke `C:\laragon\www\berita\`

2. **Import database**

   - Buka phpMyAdmin di browser: `http://localhost/phpmyadmin`
   - Klik "New" untuk membuat database baru
   - Beri nama database: `berita`
   - Pilih Collation: `utf8mb4_general_ci`
   - Klik tab "Import"
   - Pilih file `berita.sql` dari folder project
   - Klik "Go" untuk mengimport

3. **Konfigurasi database** (opsional)

   File `conn.php` sudah dikonfigurasi untuk Laragon default:

   ```php
   HOST: localhost
   USER: root
   PASS: (kosong)
   DBNAME: berita
   ```

   Jika menggunakan XAMPP/WAMP dengan konfigurasi berbeda, sesuaikan file `conn.php`.

4. **Akses aplikasi**

   Buka browser dan akses:

   ```
   http://localhost/berita
   ```

   Atau jika menggunakan Laragon dengan virtual host:

   ```
   http://berita.test
   ```

## Struktur Folder

```
berita/
├── assets/
│   ├── css/              # Stylesheet
│   ├── fonts/            # Font files
│   └── img/uploads/      # Upload artikel
├── components/           # Komponen reusable (header, footer, navbar)
├── pembaca/              # Area pembaca
├── redaktur/             # Area redaktur (CRUD, reporting, export)
├── base.php              # Base configuration
├── conn.php              # Koneksi database
├── database.php          # Database operations
├── otorisasi.php         # Authorization logic
├── validations.php       # Form validations
└── index.php             # Homepage
```

## Alur Kerja Artikel

1. **Penulis** membuat artikel (status: Draft)
2. **Penulis** submit artikel untuk review (status: Review)
3. **Redaktur** mereview dan approve artikel (status: Published)
4. **Pembaca** dapat melihat artikel yang sudah published
5. Artikel lama dapat diarsipkan (status: Archived)

## Fitur Keamanan

- Password hashing menggunakan SHA-256
- Prepared statements (PDO) untuk mencegah SQL Injection
- Sanitasi input dengan `htmlspecialchars()`
- Session-based authentication
- Role-based authorization

## Export & Reporting

Redaktur dapat mengakses fitur reporting yang menampilkan:

- Jumlah artikel per kategori
- Export data ke format Excel (.xls)
- Statistik artikel berdasarkan status

## Catatan

Proyek ini dikembangkan untuk keperluan edukasi dan demonstrasi konsep-konsep dasar web development. Proyek ini masih sangat terbatas dan belum mencakup fungsionalitas untuk portal berita yang sebenarnya.

## Lisensi

Proyek ini dibuat untuk keperluan akademik (Praktikum PAW).

## Kontribusi

Proyek ini merupakan studi kasus praktikum. Silakan fork dan modifikasi sesuai kebutuhan pembelajaran Anda.

---

**Dikembangkan untuk Praktikum Pengembangan Aplikasi Web (PAW)**
