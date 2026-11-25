# SembakoMart

Aplikasi toko sembako berbasis Laravel 11/12, PHP 8.2+, dan MySQL. Fitur: katalog, pencarian, filter kategori, registrasi/login, keranjang, checkout COD, riwayat pesanan, dashboard admin, CRUD produk, dan pembaruan status pesanan.

## Persyaratan
- PHP 8.2 atau lebih baru beserta ekstensi Laravel yang diperlukan (PDO MySQL, Mbstring, OpenSSL, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo).
- Composer 2.x.
- MySQL 8+ atau MariaDB yang kompatibel.
- Browser modern dan koneksi internet untuk memuat Bootstrap CDN.

## Instalasi lokal (Windows/XAMPP)
1. Ekstrak ZIP, lalu buka terminal di folder `SembakoMart_Laravel` (folder yang berisi `artisan` dan `composer.json`).
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env` (PowerShell: `Copy-Item .env.example .env`; CMD: `copy .env.example .env`).
4. Buat database bernama `sembakomart` melalui phpMyAdmin.
5. Atur `DB_DATABASE=sembakomart`, `DB_USERNAME=root`, dan `DB_PASSWORD=` pada `.env` sesuai konfigurasi MySQL lokal.
6. Jalankan `php artisan key:generate`.
7. Jalankan `php artisan migrate --seed`.
8. Jalankan `php artisan serve`, lalu buka `http://127.0.0.1:8000`.

## Akun demo admin lokal
- Email: `admin@sembakomart.test`
- Password: `Admin12345!`

Akun demo dibuat oleh seeder untuk pengujian lokal. Ganti password dan jangan gunakan akun ini pada server publik.

## Pengujian alur
1. Daftar akun pelanggan, lalu login.
2. Cari produk atau pilih kategori, buka detail produk, lalu tambahkan ke keranjang.
3. Ubah jumlah/hapus item, lanjut checkout COD, dan periksa halaman Pesanan Saya.
4. Login sebagai admin demo, buka Admin, kelola produk, lalu ubah status pesanan.
5. Coba status Dibatalkan; stok produk pada pesanan tersebut dikembalikan.

## Struktur data
- `users`: pelanggan/admin.
- `categories`: kategori.
- `products`: produk, harga, stok, status aktif.
- `orders`: informasi pesanan dan status.
- `order_items`: snapshot item pada saat transaksi.

## Catatan
- Keranjang disimpan dalam session.
- Pembayaran yang didukung hanya COD. Belum ada payment gateway, ongkir otomatis, notifikasi eksternal, atau upload gambar produk dari halaman admin.
- File `.env`, `vendor/`, dan `node_modules/` tidak disertakan. Jangan mengunggah `.env` ke GitHub.
- Untuk deployment, arahkan document root web server ke folder `public`, aktifkan HTTPS, gunakan kredensial database aman, dan set `APP_DEBUG=false`.
