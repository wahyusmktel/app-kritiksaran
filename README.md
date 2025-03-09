# Aplikasi Kritik & Saran SMK Telkom Lampung

<p align="center">
<img src="public/assets/img/logo.png" width="200" alt="SMK Telkom Lampung Logo">
</p>

## Tentang Aplikasi

Aplikasi Kritik & Saran adalah platform digital yang dikembangkan untuk SMK Telkom Lampung, dirancang untuk memfasilitasi komunikasi yang efektif antara siswa, orang tua, dan pihak sekolah. Aplikasi ini memungkinkan pengguna untuk menyampaikan kritik, saran, dan masukan secara terstruktur kepada unit-unit yang ada di sekolah.

## Fitur Utama

- **Pengiriman Kritik & Saran**: Kemudahan dalam menyampaikan kritik dan saran kepada unit tujuan yang spesifik
- **Unit Tujuan Terstruktur**: Pengelompokan feedback berdasarkan unit-unit sekolah
- **Manajemen Pengguna**: Sistem autentikasi dan otorisasi untuk siswa, orang tua, dan admin
- **Dashboard Admin**: Panel kontrol untuk mengelola dan menanggapi feedback yang masuk
- **Notifikasi**: Pemberitahuan status dan tindak lanjut dari feedback yang disampaikan

## Teknologi

Aplikasi ini dibangun menggunakan teknologi modern:

- **Framework**: Laravel 10.x
- **Database**: MySQL
- **Frontend**: Blade Template, TailwindCSS
- **Authentication**: Laravel Breeze

## Instalasi

1. Clone repositori ini:
```bash
git clone [repository-url]
cd app-kritik
```

2. Install dependensi PHP:
```bash
composer install
```

3. Install dependensi Node.js:
```bash
npm install
```

4. Salin file .env.example menjadi .env dan sesuaikan konfigurasi:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Jalankan migrasi database:
```bash
php artisan migrate --seed
```

7. Compile assets:
```bash
npm run dev
```

8. Jalankan aplikasi:
```bash
php artisan serve
```

## Penggunaan

1. Akses aplikasi melalui browser di `http://localhost:8000`
2. Login menggunakan kredensial yang sesuai (siswa/orang tua/admin)
3. Pilih unit tujuan untuk menyampaikan kritik atau saran
4. Isi formulir dengan detail feedback yang ingin disampaikan
5. Submit dan tunggu respon dari unit terkait

## Struktur Database

Aplikasi menggunakan beberapa tabel utama:

- `users`: Menyimpan data pengguna
- `unit_tujuan`: Daftar unit-unit sekolah
- `kritik_sarans`: Menyimpan data kritik dan saran

## Kontribusi

Untuk berkontribusi pada pengembangan aplikasi:

1. Fork repositori
2. Buat branch fitur (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Menambah fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## Lisensi

Hak Cipta © 2024 SMK Telkom Lampung. Hak cipta dilindungi undang-undang.

## Kontak

Untuk informasi lebih lanjut, hubungi:
- Email: info@smktelkomlampung.sch.id
- Website: https://smktelkomlampung.sch.id
