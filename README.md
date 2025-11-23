# Sistem Inventori Sekolah – PHP Native + TailwindCSS + AlpineJS


Sistem Inventori Barang Sekolah berbasis PHP Native dengan dukungan TailwindCSS, AlpineJS, dan MySQL. Proyek ini digunakan untuk mengelola data barang, ruangan, peminjaman, serta manajemen user dengan tampilan modern dan routing bersih.

## Struktur Direktori
```bash
/assets         → file CSS, JS, images
/config         → konfigurasi database & environment
/includes       → header, sidebar, topbar, auth, dll
/node_modules   → dependency Tailwind (ignored)
/pages          → semua halaman (barang, user, ruangan, jurusan, peminjaman)
/pages/barang   → add.php, list.php, detail.php, kode.php
/pages/user
/pages/jurusan
/pages/ruangan
/pages/peminjaman
/vendor         → Composer dependencies (ignored)

index.php       → router utama
login.php       → halaman login
logout.php      → logout
.htaccess       → routing & security
```

## Instalasi

1. Clone Repository
```bash
git clone https://github.com/super-aaaaser/inventori.git
cd inventori
```

2. Install Composer Dependencies
```bash
composer install
```

3. Install Node Modules (Tailwind)
```bash
npm install
```

## Lisensi


Proyek ini menggunakan lisensi bebas (sesuai kebutuhan kamu).