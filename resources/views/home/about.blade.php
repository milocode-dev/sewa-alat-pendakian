@extends('layouts.app')

@section('content')
    <!-- CDN Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Poppins + AOS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --forest-dark: #1B5E20;
            --forest: #2E7D32;
            --forest-light: #43A047;
        }

        .bg-forest {
            background-color: var(--forest) !important;
        }

        .bg-forest-dark {
            background-color: var(--forest-dark) !important;
        }

        .text-forest {
            color: var(--forest) !important;
        }

        .text-forest-dark {
            color: var(--forest-dark) !important;
        }

        .hover-lift {
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-6px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .12) !important;
        }

        .icon-circle {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Hero khusus halaman syarat & ketentuan */
        .tnc-hero {
            background: linear-gradient(rgba(15, 23, 42, 0.65), rgba(27, 94, 32, 0.75)),
                url('https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            border-radius: 0 0 32px 32px;
        }

        /* Nomor pasal bulat */
        .pasal-number {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        /* Sticky daftar isi */
        .toc-sticky {
            position: sticky;
            top: 24px;
        }

        .toc-link {
            display: block;
            padding: 8px 14px;
            border-radius: 10px;
            color: #475569;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background .2s ease, color .2s ease;
        }

        .toc-link:hover,
        .toc-link.active {
            background: #E8F5E9;
            color: var(--forest-dark);
            font-weight: 600;
        }

        .pasal-card {
            scroll-margin-top: 100px;
        }

        .badge-soft {
            background: #E8F5E9;
            color: var(--forest-dark);
        }
    </style>

    <!-- HERO -->
    <div class="tnc-hero py-5 mb-5">
        <div class="container">
            {{-- <nav aria-label="breadcrumb" data-aos="fade-up">
                <ol class="breadcrumb mb-3">
                    <li class="breadcrumb-item"><a href="/" class="text-white-50 text-decoration-none">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Syarat & Ketentuan</li>
                </ol>
            </nav> --}}
            <span class="badge bg-warning text-dark mb-3 px-3 fw-bold" data-aos="fade-up" data-aos-delay="50">
                Berlaku Efektif 1 Januari 2026
            </span>
            <h1 class="display-5 fw-bold text-white mb-3" data-aos="fade-up" data-aos-delay="100">Syarat & Ketentuan
                Penyewaan</h1>
            <p class="fs-6 text-light opacity-90 col-md-8 mb-0" data-aos="fade-up" data-aos-delay="150">
                Mohon baca dengan saksama sebelum menyewa alat pendakian. Dengan melakukan pemesanan,
                kamu dianggap telah membaca, memahami, dan menyetujui seluruh ketentuan di bawah ini.
            </p>
        </div>
    </div>

    <!-- RINGKASAN CEPAT -->
    <section class="py-3" data-aos="fade-up">
        <div class="container">
            <div class="row g-4 mb-2">
                @foreach ([['icon' => 'bi-calendar-check', 'judul' => 'Minimal Sewa', 'desc' => '1 hari (24 jam) per item alat.'], ['icon' => 'bi-shield-check', 'judul' => 'Deposit Aman', 'desc' => 'Dikembalikan penuh jika alat kembali utuh.'], ['icon' => 'bi-arrow-repeat', 'judul' => 'Ganti Rugi Wajar', 'desc' => 'Kerusakan ringan akibat pemakaian normal ditanggung kami.'], ['icon' => 'bi-truck', 'judul' => 'Antar Jemput', 'desc' => 'Tersedia untuk area tertentu dengan biaya tambahan.']] as $i => $item)
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="card border-0 shadow-sm rounded-4 text-center p-3 h-100 hover-lift">
                            <div class="card-body">
                                <div class="icon-circle bg-forest rounded-circle text-white fs-5 mx-auto mb-3">
                                    <i class="bi {{ $item['icon'] }}"></i>
                                </div>
                                <h6 class="fw-bold mb-1">{{ $item['judul'] }}</h6>
                                <p class="small text-muted mb-0">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ISI SYARAT & KETENTUAN -->
    <section class="py-5 bg-light mt-3">
        <div class="container">
            <div class="row g-5">

                <!-- DAFTAR ISI -->
                <div class="col-lg-3 d-none d-lg-block" data-aos="fade-right">
                    <div class="toc-sticky">
                        <p class="text-uppercase small fw-bold text-muted mb-2" style="letter-spacing:.05em;">Daftar Isi</p>
                        <nav class="nav flex-column">
                            <a class="toc-link" href="#pasal-1">1. Ketentuan Umum</a>
                            <a class="toc-link" href="#pasal-2">2. Proses Pemesanan</a>
                            <a class="toc-link" href="#pasal-3">3. Pembayaran & Deposit</a>
                            <a class="toc-link" href="#pasal-4">4. Tanggung Jawab Penyewa</a>
                            <a class="toc-link" href="#pasal-5">5. Kerusakan & Kehilangan</a>
                            <a class="toc-link" href="#pasal-6">6. Pembatalan & Perubahan</a>
                            <a class="toc-link" href="#pasal-7">7. Larangan Penggunaan</a>
                            <a class="toc-link" href="#pasal-8">8. Privasi Data</a>
                            <a class="toc-link" href="#pasal-9">9. Perubahan Ketentuan</a>
                            <a class="toc-link" href="#pasal-10">10. Kontak Kami</a>
                        </nav>
                    </div>
                </div>

                <!-- KONTEN PASAL -->
                <div class="col-lg-9">
                    @php
                        $pasal = [
                            [
                                'no' => 1,
                                'judul' => 'Ketentuan Umum',
                                'isi' => [
                                    'Layanan ini menyediakan jasa sewa alat pendakian meliputi tenda, carrier, alat masak, dan perlengkapan pendukung lainnya.',
                                    'Penyewa wajib berusia minimal 17 tahun atau didampingi oleh penanggung jawab yang telah dewasa.',
                                    'Penyewa wajib mengisi data diri yang valid dan menunjukkan identitas asli (KTP/SIM/Paspor) saat pengambilan alat.',
                                    'Masa sewa dihitung per 24 jam sejak alat diserahkan, bukan sejak waktu pemesanan.',
                                ],
                            ],
                            [
                                'no' => 2,
                                'judul' => 'Proses Pemesanan',
                                'isi' => [
                                    'Pemesanan dilakukan melalui website dengan memilih alat, tanggal sewa, dan durasi penggunaan.',
                                    'Ketersediaan alat mengikuti sistem real-time; alat yang telah dipesan pihak lain tidak dapat dijamin tersedia.',
                                    'Konfirmasi pemesanan dianggap sah setelah pembayaran diterima dan bukti transaksi diterbitkan oleh sistem.',
                                ],
                            ],
                            [
                                'no' => 3,
                                'judul' => 'Pembayaran & Deposit',
                                'isi' => [
                                    'Pembayaran dilakukan secara penuh di muka melalui metode pembayaran yang tersedia pada platform.',
                                    'Deposit jaminan dikenakan sesuai kategori alat dan akan dikembalikan penuh maksimal 3 hari kerja setelah alat diperiksa dan dinyatakan dalam kondisi baik.',
                                    'Potongan deposit dapat dikenakan apabila ditemukan kerusakan, kehilangan, atau keterlambatan pengembalian.',
                                ],
                            ],
                            [
                                'no' => 4,
                                'judul' => 'Tanggung Jawab Penyewa',
                                'isi' => [
                                    'Penyewa bertanggung jawab penuh atas alat selama masa sewa berlangsung, termasuk saat berada di lokasi pendakian.',
                                    'Alat wajib digunakan sesuai fungsi dan petunjuk penggunaan yang diberikan oleh pihak penyedia.',
                                    'Penyewa dilarang meminjamkan atau menyewakan kembali alat kepada pihak ketiga tanpa izin tertulis.',
                                ],
                            ],
                            [
                                'no' => 5,
                                'judul' => 'Kerusakan & Kehilangan',
                                'isi' => [
                                    'Kerusakan wajar akibat pemakaian normal menjadi tanggungan pihak penyedia dan tidak dikenakan biaya tambahan.',
                                    'Kerusakan berat, kehilangan, atau kerusakan akibat kelalaian akan dikenakan biaya penggantian sesuai nilai alat yang berlaku.',
                                    'Klaim kerusakan wajib dilaporkan maksimal 1x24 jam setelah alat dikembalikan untuk diproses lebih lanjut.',
                                ],
                            ],
                            [
                                'no' => 6,
                                'judul' => 'Pembatalan & Perubahan',
                                'isi' => [
                                    'Pembatalan yang dilakukan lebih dari 3 hari sebelum tanggal sewa akan dikembalikan dana sebesar 100%.',
                                    'Pembatalan kurang dari 3 hari sebelum tanggal sewa dikenakan biaya administrasi sebesar 25% dari total transaksi.',
                                    'Perubahan tanggal atau durasi sewa dapat diajukan maksimal 1 kali dan tunduk pada ketersediaan alat.',
                                ],
                            ],
                            [
                                'no' => 7,
                                'judul' => 'Larangan Penggunaan',
                                'isi' => [
                                    'Alat dilarang digunakan untuk kegiatan komersial, produksi konten berbayar, atau kegiatan ilegal apa pun.',
                                    'Alat dilarang dimodifikasi, dicat, atau diubah bentuk fisiknya tanpa persetujuan pihak penyedia.',
                                    'Penggunaan di luar area yang disepakati (contoh: kegiatan ekstrem berisiko tinggi tanpa pemberitahuan) dapat membatalkan jaminan kerusakan.',
                                ],
                            ],
                            [
                                'no' => 8,
                                'judul' => 'Privasi Data',
                                'isi' => [
                                    'Data pribadi penyewa hanya digunakan untuk keperluan verifikasi, transaksi, dan komunikasi terkait layanan.',
                                    'Kami tidak akan membagikan data pribadi kepada pihak ketiga tanpa persetujuan, kecuali diwajibkan oleh hukum yang berlaku.',
                                ],
                            ],
                            [
                                'no' => 9,
                                'judul' => 'Perubahan Ketentuan',
                                'isi' => [
                                    'Pihak penyedia berhak mengubah, menambah, atau memperbarui syarat dan ketentuan ini sewaktu-waktu.',
                                    'Perubahan akan diinformasikan melalui halaman ini dan berlaku efektif sejak tanggal pembaruan dipublikasikan.',
                                ],
                            ],
                            [
                                'no' => 10,
                                'judul' => 'Kontak Kami',
                                'isi' => [
                                    'Untuk pertanyaan, keluhan, atau bantuan lebih lanjut terkait syarat dan ketentuan ini, silakan hubungi tim layanan pelanggan kami melalui halaman kontak atau email resmi yang tertera di situs.',
                                ],
                            ],
                        ];
                    @endphp

                    @foreach ($pasal as $i => $p)
                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 hover-lift pasal-card"
                            id="pasal-{{ $p['no'] }}" data-aos="fade-up" data-aos-delay="{{ $i * 30 }}">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="pasal-number bg-forest text-white rounded-circle">{{ $p['no'] }}</div>
                                    <h4 class="fw-bold mb-0">{{ $p['judul'] }}</h4>
                                </div>
                                <ul class="mb-0 ps-3">
                                    @foreach ($p['isi'] as $poin)
                                        <li class="text-muted mb-2">{{ $poin }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <!-- CTA PERSETUJUAN -->
    <section class="py-5 bg-white" data-aos="fade-up">
        <div class="container">
            <div class="rounded-4 p-5 text-center text-white position-relative"
                style="background: linear-gradient(rgba(15,23,42,.75), rgba(27,94,32,.85)), url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=1400&q=80'); background-size:cover; background-position:center;">
                <span class="badge bg-white text-forest-dark rounded-pill px-3 py-2 mb-3 fw-bold">
                    <i class="bi bi-file-earmark-check me-1"></i>Sudah Membaca Semua Ketentuan?
                </span>
                <h2 class="fw-bold mb-3">Yuk, Mulai Persiapkan Pendakianmu</h2>
                <p class="mb-4 opacity-90 col-md-7 mx-auto">
                    Dengan melanjutkan pemesanan, kamu menyatakan setuju terhadap seluruh syarat dan ketentuan di atas.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#katalog" class="btn btn-warning btn-lg fw-bold rounded-pill px-4">Lihat Katalog Alat</a>
                    <a href="/kontak" class="btn btn-outline-light btn-lg rounded-pill px-4">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
            once: true,
            offset: 80
        });

        // Highlight daftar isi sesuai scroll posisi
        const tocLinks = document.querySelectorAll('.toc-link');
        const pasalSections = document.querySelectorAll('.pasal-card');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    tocLinks.forEach(link => {
                        link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                    });
                }
            });
        }, {
            rootMargin: '-40% 0px -50% 0px'
        });

        pasalSections.forEach(section => observer.observe(section));
    </script>
@endsection
