@extends('layouts.app')

@section('content')
    <!-- CDN Bootstrap Icons (Disarankan ditaruh di file layouts/app.blade.php di dalam tag <head>) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- TAMBAHAN BARU: Font Poppins + AOS (animasi ringan) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Tag CSS/Style -->
    <style>
        .parent {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(5, 1fr);
            gap: 16px;
            min-height: 85vh;
            /* Menjaga agar grid punya tinggi proporsional */
        }

        /* Common Styling untuk Card Grid */
        .grid-card {
            border-radius: 12px;
            padding: 24px;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .grid-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* DIV 1: Hero Banner (Top) */
        .div1 {
            grid-column: span 5 / span 5;
            grid-row: span 3 / span 3;
            background: linear-gradient(rgba(15, 23, 42, 0.6), rgba(15, 23, 42, 0.7)),
                url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            align-items: flex-start;
            position: relative;
        }

        .div2 {
            grid-row: span 2 / span 2;
            grid-row-start: 4;
            background-color: #2e5a44;
        }

        .div3 {
            grid-row: span 2 / span 2;
            grid-row-start: 4;
            background-color: #1e293b;
        }

        .div4 {
            grid-row: span 2 / span 2;
            grid-row-start: 4;
            background-color: #3b5249;
        }

        .div5 {
            grid-column: span 2 / span 2;
            grid-row: span 2 / span 2;
            grid-row-start: 4;
            background: linear-gradient(135deg, #d97706, #b45309);
        }

        @media (max-width: 768px) {
            .parent {
                display: flex;
                flex-direction: column;
            }
        }

        /* ============================================================
           TAMBAHAN BARU — minim, hanya untuk hal yang Bootstrap tak punya:
           hover-lift, garis timeline putus-putus, dan warna brand.
           ============================================================ */
        body { font-family: 'Poppins', sans-serif; }

        :root {
            --forest-dark: #1B5E20;
            --forest: #2E7D32;
            --forest-light: #43A047;
        }

        .bg-forest { background-color: var(--forest) !important; }
        .bg-forest-dark { background-color: var(--forest-dark) !important; }
        .text-forest { color: var(--forest) !important; }

        .hover-lift { transition: transform .3s ease, box-shadow .3s ease; }
        .hover-lift:hover { transform: translateY(-6px); box-shadow: 0 1rem 2rem rgba(0,0,0,.12) !important; }

        .hover-zoom-img { overflow: hidden; }
        .hover-zoom-img img { transition: transform .4s ease; }
        .hover-zoom-img:hover img { transform: scale(1.08); }

        .icon-circle {
            width: 64px; height: 64px;
            display: flex; align-items: center; justify-content: center;
        }

        .timeline-dashed::after {
            content: "";
            position: absolute;
            top: 28px; left: 50%; width: 100%; height: 2px;
            background: repeating-linear-gradient(90deg, #C8E6C9 0 8px, transparent 8px 16px);
            z-index: 0;
        }
        @media (max-width: 768px) { .timeline-dashed::after { display: none; } }

        .hero-badge-float { animation: floatY 3s ease-in-out infinite; }
        @keyframes floatY { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
    </style>

    <!-- Tag HTML/Konten -->
    <div class="parent">

        <!-- DIV 1: HERO SECTION -->
        <div class="div1 grid-card" data-aos="fade-in">

            <!-- TAMBAHAN BARU: Floating badge & rating, pakai class Bootstrap (position-absolute, rounded-pill, bg-white, shadow) -->
            <span class="position-absolute top-0 end-0 m-3 badge bg-white text-dark rounded-pill px-3 py-2 shadow hero-badge-float">
                <i class="bi bi-shield-check text-success me-1"></i>100% Alat Bersih & Terawat
            </span>

            <div class="d-flex align-items-center gap-2 bg-white bg-opacity-25 rounded-pill px-3 py-2 mb-3" data-aos="fade-up" data-aos-delay="100">
                <span class="text-warning"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></span>
                <small class="text-white">4.9/5 dari 1.200+ Pendaki</small>
            </div>

            <span class="badge bg-warning text-dark mb-2 px-3 py-2 fw-bold" style="width: fit-content;" data-aos="fade-up">
                Sewa Alat Gunung Lengkap & Murah
            </span>
            <h1 class="display-4 fw-bold mb-3" data-aos="fade-up" data-aos-delay="150">Siap Menjelajah Puncak Impianmu?</h1>
            <p class="fs-5 text-light opacity-90 col-md-8 mb-4" data-aos="fade-up" data-aos-delay="200">
                Peralatan pendakian kualitas premium, selalu bersih, terawat, dan siap menemani setiap petualanganmu tanpa
                perlu beli mahal.
            </p>

            <div class="d-flex gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="250">
                <a href="#katalog" class="btn btn-warning btn-lg fw-bold px-4 shadow rounded-pill">
                    Lihat Katalog & Sewa Sekarang
                </a>
                <a href="#cara-sewa" class="btn btn-outline-light btn-lg rounded-pill">
                    Cara Menyewa <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <!-- DIV 2: KATEGORI TENDA -->
        <div class="div2 grid-card text-center align-items-center">
<img width="48" height="48" src="https://img.icons8.com/ink/48/FFFFFF/tent-in-the-forest.png" alt="tent-in-the-forest"/>            {{-- <i class="bi bi-house fs-1 mb-2"></i> --}}
            <h5 class="fw-bold mb-1">Tenda Camping</h5>
            <p class="small text-light opacity-75 mb-0">Kapasitas 2-6 orang, waterproof & tahan angin.</p>
        </div>

        <!-- DIV 3: KATEGORI CARRIER -->
        <div class="div3 grid-card text-center align-items-center">
            <i class="bi bi-backpack fs-1 mb-2"></i>
            <h5 class="fw-bold mb-1">Tas Carrier</h5>
            <p class="small text-light opacity-75 mb-0">Ukuran 45L - 80L, ergonomis & nyaman di punggung.</p>
        </div>

        <!-- DIV 4: KATEGORI ALAT MASAK -->
        <div class="div4 grid-card text-center align-items-center">
            <i class="bi bi-fire fs-1 mb-2"></i>
            <h5 class="fw-bold mb-1">Alat Masak & Nesting</h5>
            <p class="small text-light opacity-75 mb-0">Kompor portable, flysheet, matras, & lighting.</p>
        </div>

        <!-- DIV 5: PAKET HEMAT / PROMO -->
        <div class="div5 grid-card justify-content-between">
            <div>
                <span class="badge bg-light text-dark fw-bold mb-2">Best Seller</span>
                <h4 class="fw-bold mb-2">Paket Pendaki Pemula <i class="bi bi-compass"></i></h4>
                <p class="small mb-0">
                    Dapatkan Tenda + 2 Carrier + Kompor + Matras dalam 1 paket hemat!
                </p>
            </div>
            <div class="mt-3">
                <a href="#" class="btn btn-light text-dark fw-bold btn-sm">
                    Cek Detail Paket &rarr;
                </a>
            </div>
        </div>

    </div>
    
    {{-- Kode Yang Baru --}}

    {{-- TAMBAHAN BARU: KATEGORI ALAT — card Bootstrap + hover-lift --}}
    <section class="py-5 bg-white" id="kategori" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-forest bg-opacity-10 text-forest rounded-pill px-3 py-2 mb-2">Kategori</span>
                <h2 class="fw-bold">Pilih Alat Sesuai Kebutuhanmu</h2>
                <p class="text-muted col-md-6 mx-auto">Koleksi lengkap peralatan pendakian, siap pakai kapan saja.</p>
            </div>
            <div class="row g-4">
                @foreach ([
                    ['icon' => 'bi-house-door', 'nama' => 'Tenda', 'jumlah' => 24],
                    ['icon' => 'bi-backpack', 'nama' => 'Carrier', 'jumlah' => 18],
                    ['icon' => 'bi-fire', 'nama' => 'Alat Masak', 'jumlah' => 15],
                    ['icon' => 'bi-lightbulb', 'nama' => 'Lighting', 'jumlah' => 10],
                ] as $i => $kat)
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="card border-0 shadow-sm rounded-4 text-center p-3 h-100 hover-lift">
                            <div class="card-body">
                                <div class="icon-circle bg-forest rounded-circle text-white fs-4 mx-auto mb-3">
                                    <i class="bi {{ $kat['icon'] }}"></i>
                                </div>
                                <h6 class="fw-bold mb-1">{{ $kat['nama'] }}</h6>
                                <p class="small text-muted mb-0">{{ $kat['jumlah'] }} item tersedia</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TAMBAHAN BARU: PRODUK POPULER — card Bootstrap standar --}}
    <section class="py-5 bg-light" id="katalog" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-forest bg-opacity-10 text-forest rounded-pill px-3 py-2 mb-2">Katalog</span>
                <h2 class="fw-bold">Produk Paling Diminati</h2>
                <p class="text-muted col-md-6 mx-auto">Alat favorit para pendaki, kualitas terjamin.</p>
            </div>
            <div class="row g-4">
                @php
                    $produkPopuler = [
                        ['nama' => 'Tenda Dome 4P', 'kategori' => 'Tenda', 'harga' => '35.000', 'rating' => '4.9', 'img' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=500&q=80'],
                        ['nama' => 'Carrier 60L', 'kategori' => 'Carrier', 'harga' => '25.000', 'rating' => '4.8', 'img' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=500&q=80'],
                        ['nama' => 'Kompor Portable', 'kategori' => 'Masak', 'harga' => '15.000', 'rating' => '4.7', 'img' => 'https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?auto=format&fit=crop&w=500&q=80'],
                        ['nama' => 'Sleeping Bag', 'kategori' => 'Tidur', 'harga' => '20.000', 'rating' => '4.9', 'img' => 'https://images.unsplash.com/photo-1445307806294-bff7f67ff225?auto=format&fit=crop&w=500&q=80'],
                    ];
                @endphp

                @foreach ($produkPopuler as $i => $produk)
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="card border-0 shadow-sm rounded-4 h-100 hover-lift">
                            <div class="position-relative rounded-top-4 hover-zoom-img" style="height:220px; overflow:hidden;">
                                <span class="position-absolute top-0 start-0 m-2 badge bg-forest-dark rounded-pill">{{ $produk['kategori'] }}</span>
                                <span class="position-absolute top-0 end-0 m-2 badge bg-white text-forest rounded-pill">
                                    <i class="bi bi-check-circle-fill text-success me-1"></i>Tersedia
                                </span>
                                <img src="{{ $produk['img'] }}" class="w-100 h-100 rounded-top-4" style="object-fit:cover;" alt="{{ $produk['nama'] }}">
                            </div>
                            <div class="card-body">
                                <h6 class="fw-bold mb-1">{{ $produk['nama'] }}</h6>
                                <div class="d-flex align-items-center gap-1 mb-2">
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <small class="text-muted">{{ $produk['rating'] }} (120 sewa)</small>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="fw-bold text-forest-dark">
                                        Rp{{ $produk['harga'] }} <small class="text-muted fw-normal">/hari</small>
                                    </div>
                                    <button class="btn btn-success btn-sm rounded-pill px-3">Sewa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TAMBAHAN BARU: KENAPA MEMILIH KAMI --}}
    <section class="py-5 bg-white" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-forest bg-opacity-10 text-forest rounded-pill px-3 py-2 mb-2">Keunggulan</span>
                <h2 class="fw-bold">Kenapa Memilih Kami</h2>
            </div>
            <div class="row g-4">
                @foreach ([
                    ['icon' => 'bi-shield-check', 'judul' => 'Alat Terjamin Bersih', 'desc' => 'Dicuci & disterilkan sebelum disewakan kembali.'],
                    ['icon' => 'bi-cash-coin', 'judul' => 'Harga Bersahabat', 'desc' => 'Jauh lebih hemat dibanding beli alat baru.'],
                    ['icon' => 'bi-truck', 'judul' => 'Antar-Jemput Mudah', 'desc' => 'Ambil di toko atau diantar ke lokasimu.'],
                    ['icon' => 'bi-headset', 'judul' => 'CS Siap Membantu', 'desc' => 'Tim support responsif via WhatsApp.'],
                    ['icon' => 'bi-tools', 'judul' => 'Alat Terawat', 'desc' => 'Kondisi dicek rutin sebelum digunakan.'],
                    ['icon' => 'bi-geo-alt', 'judul' => 'Lokasi Strategis', 'desc' => 'Dekat basecamp pendakian populer.'],
                ] as $i => $item)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="p-3 rounded-4 hover-lift h-100">
                            <div class="icon-circle bg-forest bg-opacity-10 text-forest rounded-3 fs-4 mb-3">
                                <i class="bi {{ $item['icon'] }}"></i>
                            </div>
                            <h6 class="fw-bold">{{ $item['judul'] }}</h6>
                            <p class="small text-muted mb-0">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TAMBAHAN BARU: CARA MENYEWA — timeline pakai grid Bootstrap --}}
    <section class="py-5 bg-light" id="cara-sewa" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-forest bg-opacity-10 text-forest rounded-pill px-3 py-2 mb-2">Panduan</span>
                <h2 class="fw-bold">Cara Menyewa</h2>
                <p class="text-muted col-md-6 mx-auto">Hanya 4 langkah mudah, alat siap kamu bawa mendaki.</p>
            </div>
            <div class="row g-4 text-center">
                @foreach ([
                    ['judul' => 'Pilih Alat', 'desc' => 'Cari & pilih alat dari katalog.'],
                    ['judul' => 'Tentukan Tanggal', 'desc' => 'Atur tanggal sewa & durasi.'],
                    ['judul' => 'Bayar & Konfirmasi', 'desc' => 'Lakukan pembayaran secara online.'],
                    ['judul' => 'Ambil & Mendaki', 'desc' => 'Ambil alat, siap menuju puncak!'],
                ] as $i => $step)
                    <div class="col-6 col-md-3 position-relative {{ $i < 3 ? 'timeline-dashed' : '' }}" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="position-relative" style="z-index:1;">
                            <div class="icon-circle bg-forest text-white rounded-circle fw-bold fs-5 mx-auto mb-3 shadow">{{ $i + 1 }}</div>
                            <h6 class="fw-bold">{{ $step['judul'] }}</h6>
                            <p class="small text-muted">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- TAMBAHAN BARU: TESTIMONI --}}
    <section class="py-5 bg-light" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-forest bg-opacity-10 text-forest rounded-pill px-3 py-2 mb-2">Testimoni</span>
                <h2 class="fw-bold">Kata Mereka yang Sudah Mendaki</h2>
            </div>
            <div class="row g-4">
                @foreach ([
                    ['nama' => 'Rizky Ananda', 'label' => 'Pendaki Semeru', 'img' => 12, 'text' => 'Alatnya bersih banget dan lengkap, proses sewa cepat. Bakal sewa lagi.'],
                    ['nama' => 'Dinda Puspita', 'label' => 'Pendaki Rinjani', 'img' => 32, 'text' => 'Harga sewa jauh lebih murah dibanding beli baru. Kualitas masih layak pakai.'],
                    ['nama' => 'Fajar Nugroho', 'label' => 'Pendaki Prau', 'img' => 45, 'text' => 'CS-nya ramah dan fast respon, alat diantar tepat waktu. Recommended!'],
                ] as $i => $testi)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 hover-lift">
                            <div class="text-warning mb-2 small">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p class="small text-muted">"{{ $testi['text'] }}"</p>
                            <div class="d-flex align-items-center gap-2 mt-2">
                                <img src="https://i.pravatar.cc/48?img={{ $testi['img'] }}" class="rounded-circle" width="44" height="44" alt="{{ $testi['nama'] }}">
                                <div>
                                    <h6 class="fw-bold mb-0 small">{{ $testi['nama'] }}</h6>
                                    <small class="text-muted">{{ $testi['label'] }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TAMBAHAN BARU: GALERI --}}
    <section class="py-5 bg-white" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-forest bg-opacity-10 text-forest rounded-pill px-3 py-2 mb-2">Galeri</span>
                <h2 class="fw-bold">Momen Para Pendaki</h2>
            </div>
            <div class="row g-3">
                @foreach ([
                    'https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1533240332313-0db49b459ad6?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=400&q=80',
                    'https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=400&q=80',
                ] as $i => $foto)
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="rounded-4 hover-zoom-img shadow-sm" style="height:220px; overflow:hidden;">
                            <img src="{{ $foto }}" class="w-100 h-100" style="object-fit:cover;" alt="Galeri {{ $i + 1 }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TAMBAHAN BARU: FAQ — accordion Bootstrap murni --}}
    <section class="py-5 bg-light" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-forest bg-opacity-10 text-forest rounded-pill px-3 py-2 mb-2">FAQ</span>
                <h2 class="fw-bold">Pertanyaan yang Sering Diajukan</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        @foreach ([
                            ['q' => 'Berapa lama minimal masa sewa alat?', 'a' => 'Minimal sewa adalah 1 hari (24 jam) untuk semua kategori alat.'],
                            ['q' => 'Apakah ada deposit atau jaminan?', 'a' => 'Ya, sistem deposit akan dikembalikan penuh setelah alat kembali dalam kondisi baik.'],
                            ['q' => 'Bagaimana jika alat rusak saat digunakan?', 'a' => 'Kerusakan wajar ditanggung kami. Kerusakan berat dikenakan biaya sesuai ketentuan.'],
                            ['q' => 'Apakah bisa antar-jemput alat?', 'a' => 'Bisa, kami menyediakan layanan antar-jemput untuk area tertentu dengan biaya tambahan.'],
                        ] as $i => $faq)
                            <div class="accordion-item rounded-3 mb-2 border-0 shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}">
                                        {{ $faq['q'] }}
                                    </button>
                                </h2>
                                <div id="faq{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body small text-muted">{{ $faq['a'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TAMBAHAN BARU: CTA BESAR --}}
    <section class="py-5 bg-white" data-aos="fade-up">
        <div class="container">
            <div class="rounded-4 p-5 text-center text-white position-relative"
                 style="background: linear-gradient(rgba(15,23,42,.75), rgba(27,94,32,.85)), url('https://images.unsplash.com/photo-1501555088652-021faa106b9b?auto=format&fit=crop&w=1400&q=80'); background-size:cover; background-position:center;">
                <h2 class="fw-bold mb-3">Siap Untuk Petualangan Berikutnya?</h2>
                <p class="mb-4 opacity-90 col-md-7 mx-auto">Sewa alat pendakian terbaik sekarang juga dan wujudkan perjalanan ke puncak impianmu.</p>
                <a href="#katalog" class="btn btn-warning btn-lg fw-bold rounded-pill px-4">Mulai Sewa Sekarang</a>
            </div>
        </div>
    </section>

   

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 80 });
    </script>
@endsection