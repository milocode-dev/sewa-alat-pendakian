# 🏔️ Sistem Informasi Sewa Alat Pendakian

[![Node.js Version](https://img.shields.io/badge/node->=%2020.0.0-brightgreen.svg)](https://nodejs.org/)
[![Vite](https://img.shields.io/badge/vite-%5E5.0.0-646CFF.svg)](https://vitejs.dev/)
[![Laravel](https://img.shields.io/badge/laravel-%5E10.0-FF2D20.svg)](https://laravel.com/)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

Aplikasi berbasis web modern untuk memudahkan pendaki meminjam/menyewa peralatan outdoor (tenda, carrier, sepatu, alat masak, dll) serta membantu pengelola toko outdoor dalam memanajemen inventaris dan transaksi persewaan secara real-time.

---

## 📸 Tampilan Aplikasi

| Halaman Utama (Katalog) | Detail Produk & Booking |
| :---: | :---: |
| *(Tampilkan Screenshot)* | *(Tampilkan Screenshot)* |

---

## ✨ Fitur Utama

### 🛒 Untuk Pelanggan (Pendaki)
* **Katalog Peralatan Interactive:** Pencarian cepat dan filter alat berdasarkan kategori (Tenda, Carrier, Safety, dll).
* **Cek Ketersediaan Real-Time:** Menghindari bentrok tanggal sewa antar pelanggan.
* **Sistem Keranjang & Booking:** Proses pemesanan alat outdoor secara online dengan cepat.
* **Riwayat Transaksi:** Memantau status penyewaan (Pending, Disetujui, Sedang Dipinjam, Selesai).

### 🛠️ Untuk Pengelola (Admin)
* **Manajemen Inventaris (CRUD):** Tambah, ubah, dan hapus stok peralatan beserta kondisinya.
* **Verifikasi Transaksi:** Konfirmasi pembayaran dan persetujuan sewa.
* **Manajemen Pengembalian:** Catat tanggal pengembalian dan perhitungan denda (jika ada keterlambatan/kerusakan).
* **Laporan Keuangan:** Ringkasan pendapatan dan statistik alat yang paling sering disewa.

---

## 🚀 Tech Stack

- **Frontend:** React / Vue / Blade *(Sesuaikan dengan yang digunakan)* + Tailwind CSS
- **Bundler:** Vite & Rolldown
- **Backend:** Laravel / Node.js *(Sesuaikan)*
- **Database:** MySQL (via Laragon / XAMPP)
- **Tooling:** NPM, Git

---

## ⚙️ Panduan Instalasi & Jalankan Proyek

Pastikan perangkat Anda sudah terinstal:
* [Node.js](https://nodejs.org/) (Versi **v20.x** atau lebih baru)
* [PHP](https://www.php.net/) (Versi >= 8.1)
* [Composer](https://getcomposer.org/)
* Server Lokal (Laragon / XAMPP)

### 1. Clone Repositori
```bash
git clone [https://github.com/username-anda/sewa-alat-pendakian.git](https://github.com/username-anda/sewa-alat-pendakian.git)
cd sewa-alat-pendakian
