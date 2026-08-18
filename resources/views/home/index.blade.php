@extends('layouts.app')

@section('content')
    <!-- CDN Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Poppins + AOS Animation -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Tag CSS/Style -->
    <style>
        /* Styling Star Rating Interactive */
        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            color: #e4e5e9;
            /* Warna bintang saat belum dipilih (Abu-abu) */
            transition: color 0.2s ease-in-out;
        }

        /* Saat di-hover atau dipilih, ubah bintang dan bintang di kirinya menjadi kuning */
        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input[type="radio"]:checked~label {
            color: #ffc107;
            /* Warna kuning Bootstrap warning */
        }

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

        .hover-lift {
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-6px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .12) !important;
        }

        .hover-zoom-img {
            overflow: hidden;
        }

        .hover-zoom-img img {
            transition: transform .4s ease;
        }

        .hover-zoom-img:hover img {
            transform: scale(1.08);
        }

        .icon-circle {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .timeline-dashed::after {
            content: "";
            position: absolute;
            top: 28px;
            left: 50%;
            width: 100%;
            height: 2px;
            background: repeating-linear-gradient(90deg, #C8E6C9 0 8px, transparent 8px 16px);
            z-index: 0;
        }

        @media (max-width: 768px) {
            .timeline-dashed::after {
                display: none;
            }
        }

        .hero-badge-float {
            animation: floatY 3s ease-in-out infinite;
        }

        @keyframes floatY {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }
    </style>

    <!-- Tag HTML/Konten -->
    <div class="parent">

        <!-- DIV 1: HERO SECTION -->
        <div class="div1 grid-card" data-aos="fade-in">

            <!-- TAMBAHAN BARU: Floating badge & rating, pakai class Bootstrap (position-absolute, rounded-pill, bg-white, shadow) -->
            <span
                class="position-absolute top-0  m-3 badge bg-white text-dark rounded-pill px-3 py-2 shadow hero-badge-float">
                <i class="bi bi-shield-check text-success me-1"></i>100% Alat Bersih & Terawat
            </span>

            <div class="d-flex align-items-center gap-2 bg-white bg-opacity-25 rounded-pill px-3 py-2 mb-3"
                data-aos="fade-up" data-aos-delay="100">
                <span class="text-warning"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></span>
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
        <div class="div2 grid-card text-center align-items-center" data-aos="fade-up" data-aos-delay="100">
            <img width="48" height="48" src="https://img.icons8.com/ink/48/FFFFFF/tent-in-the-forest.png"
                alt="Tenda Camping">
            <h5 class="fw-bold mb-1">Tenda Camping</h5>
            <p class="small text-light opacity-75 mb-0">
                Kapasitas 2–6 orang, waterproof & tahan angin.
            </p>
        </div>

        <!-- DIV 3: KATEGORI CARRIER -->
        <div class="div3 grid-card text-center align-items-center" data-aos="fade-up" data-aos-delay="150">
            <i class="bi bi-backpack fs-1 mb-2"></i>
            <h5 class="fw-bold mb-1">Tas Carrier</h5>
            <p class="small text-light opacity-75 mb-0">
                Ukuran 45L–80L, ergonomis dan nyaman digunakan.
            </p>
        </div>

        <!-- DIV 4: KATEGORI ALAT MASAK -->
        <div class="div4 grid-card text-center align-items-center" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-fire fs-1 mb-2"></i>
            <h5 class="fw-bold mb-1">Alat Masak</h5>
            <p class="small text-light opacity-75 mb-0">
                Kompor portable, gas, nesting, dan perlengkapan memasak.
            </p>
        </div>

        <!-- DIV 5: KATEGORI SLEEPING GEAR -->
        <div class="div5 grid-card text-center align-items-center" data-aos="fade-up" data-aos-delay="250">
            <i class="bi bi-moon-stars fs-1 mb-2"></i>
            <h5 class="fw-bold mb-1">Sleeping Gear</h5>
            <p class="small text-light opacity-75 mb-0">
                Sleeping bag, matras, bantal angin, dan perlengkapan tidur.
            </p>
        </div>



    </div>


    {{-- Kode Yang Baru --}}
    {{-- TAMPILAN KATEGORI --}}
    <section class="py-5 bg-white" id="kategori" data-aos="fade-in">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Pilih Alat Sesuai Kebutuhanmu</h2>
                <p class="text-muted col-md-6 mx-auto">Koleksi lengkap peralatan pendakian, siap pakai kapan saja.</p>
            </div>
            <div class="row g-4">
                @foreach ([['icon' => 'bi-house-door', 'nama' => 'Tenda', 'jumlah' => 240], ['icon' => 'bi-backpack', 'nama' => 'Carrier', 'jumlah' => 180], ['icon' => 'bi-fire', 'nama' => 'Alat Masak', 'jumlah' => 150], ['icon' => 'bi-lightbulb', 'nama' => 'Lighting', 'jumlah' => 100]] as $i => $kat)
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="card border-0 shadow-sm rounded-4 text-center p-3 h-100 hover-lift">
                            <div class="card-body">
                                <div class="icon-circle bg-forest rounded-circle text-white fs-4 mx-auto mb-3">
                                    <i class="bi {{ $kat['icon'] }}"></i>
                                </div>
                                <h6 class="fw-bold mb-1">{{ $kat['nama'] }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Section khusus best seller --}}


    {{-- Section Produk Populer --}}
    <section class="py-5 bg-light position-relative overflow-hidden">
        <div class="container py-4">

            {{-- Section Header --}}
            <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
                <div class="col-lg-7">
                    <span
                        class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2 mb-2 fw-semibold">
                        <i class="bi bi-fire me-1"></i> Paling Banyak Disewa
                    </span>
                    <h2 class="fw-extrabold display-6 text-gradient-forest mb-2">Produk Populer</h2>
                    <p class="text-muted">Pilihan perlengkapan terbaik yang sering disewa oleh pelanggan kami.</p>
                </div>
            </div>

            {{-- Grid Produk --}}
            <div class="row g-4">
                @foreach ($produkPopuler as $i => $produk)
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="card card-popular border-0 shadow-sm rounded-4 h-100 bg-white">

                            {{-- Container Gambar --}}
                            <div class="position-relative rounded-top-4 hover-zoom-img overflow-hidden"
                                style="height:220px;">

                                {{-- Badge Hot / Populer --}}
                                <span
                                    class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark fw-bold rounded-pill shadow-sm badge-hot z-2">
                                    🔥 Popular
                                </span>

                                {{-- Badge Kategori --}}
                                <span
                                    class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75 backdrop-blur rounded-pill z-2">
                                    {{ $produk->category->name ?? 'Umum' }}
                                </span>

                                {{-- Gambar --}}
                                <img src="{{ asset('storage/' . $produk->image) }}" class="w-100 h-100 object-fit-cover"
                                    alt="{{ $produk->item_name }}">
                            </div>

                            {{-- Card Body --}}
                            <div class="card-body d-flex flex-column justify-content-between p-4">
                                <div>
                                    <h6 class="fw-bold text-dark mb-2 text-truncate" title="{{ $produk->item_name }}">
                                        {{ $produk->item_name }}
                                    </h6>
                                </div>

                                <div
                                    class="d-flex align-items-center justify-content-between mt-3 pt-2 border-top border-light">
                                    {{-- Harga --}}
                                    <div>
                                        <small class="text-muted d-block style="font-size: 0.75rem;">Mulai dari</small>
                                        <span class="fw-bold text-success fs-6">
                                            Rp{{ number_format($produk->price_per_day, 0, ',', '.') }}
                                        </span>
                                        <small class="text-muted fw-normal">/hari</small>
                                    </div>

                                    {{-- Tombol Sewa --}}
                                    <a class="btn btn-success btn-pulse btn-sm rounded-pill px-3 fw-semibold shadow-sm"
                                        href="{{ route('katalog') }}">
                                        Sewa <i class="bi bi-arrow-right-short ms-1"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>






    {{-- ALUR PENYEWAAN --}}
    <section class="py-5 bg-light" id="cara-sewa" data-aos="fade-in">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Cara Menyewa</h2>
                <p class="text-muted col-md-6 mx-auto">Hanya 4 langkah mudah, alat siap kamu bawa mendaki.</p>
            </div>
            <div class="row g-4 text-center">
                @foreach ([['judul' => 'Pilih Alat', 'desc' => 'Cari & pilih alat dari katalog.'], ['judul' => 'Tentukan Tanggal', 'desc' => 'Atur tanggal sewa & durasi.'], ['judul' => 'Bayar & Konfirmasi', 'desc' => 'Lakukan pembayaran secara online.'], ['judul' => 'Ambil & Mendaki', 'desc' => 'Ambil alat, siap menuju puncak!']] as $i => $step)
                    <div class="col-6 col-md-3 position-relative {{ $i < 3 ? 'timeline-dashed' : '' }}"
                        data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="position-relative" style="z-index:1;">
                            <div class="icon-circle bg-forest text-white rounded-circle fw-bold fs-5 mx-auto mb-3 shadow">
                                {{ $i + 1 }}</div>
                            <h6 class="fw-bold">{{ $step['judul'] }}</h6>
                            <p class="small text-muted">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- KOMENTAR PELANGGAN --}}
    <section class="py-5 bg-light" data-aos="fade-in">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Kata Mereka yang Sudah Mendaki</h2>
            </div>
            <div class="row g-4">
                @forelse ($testimonials as $testimonial)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 hover-lift">
                            {{-- DITAMPILKAN SECARA DINAMIS --}}
                            <div class="text-warning mb-2 small">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star{{ $i <= ($testimonial->rating ?? 5) ? '-fill' : '' }}"></i>
                                @endfor
                            </div>
                            <p class="small text-muted">"{{ $testimonial->message }}"</p>
                            <div class="d-flex align-items-center gap-2 mt-2">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonial->user->name) }}"
                                    class="rounded-circle" width="44" height="44"
                                    alt="{{ $testimonial->user->name }}">
                                <div>
                                    <h6 class="fw-bold mb-0 small">{{ $testimonial->user->name }}</h6>
                                    <small class="text-muted">{{ $testimonial->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        Belum ada testimoni. Jadi yang pertama berbagi pengalaman!
                    </div>
                @endforelse
            </div>

            {{-- FORM SUBMIT TESTIMONI --}}
            <div class="row justify-content-center mt-5" data-aos="fade-up">
                <div class="col-lg-6">

                    @if (session('success'))
                        <div class="alert alert-success rounded-3 text-center small">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 text-center small">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    @auth
                        <div class="card border-0 shadow-sm rounded-4 p-4" data-aos="zoom-in" data-aos-delay="100">
                            <h6 class="fw-bold mb-3 text-center">Bagikan Pengalamanmu</h6>
                            <form action="{{ route('testimonials.store') }}" method="POST"
                                onsubmit="this.querySelector('button[type=submit]').disabled = true;">
                                @csrf

                                {{-- PILIHAN RATING BINTANG --}}
                                <div class="mb-3 text-center">
                                    <label class="form-label small text-muted d-block mb-1">Beri Rating:</label>
                                    <div
                                        class="star-rating d-inline-flex flex-row-reverse justify-content-center gap-1 fs-5 text-warning">
                                        <input type="radio" id="star5" name="rating" value="5" required />
                                        <label for="star5" title="5 Bintang"><i class="bi bi-star-fill"></i></label>

                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label for="star4" title="4 Bintang"><i class="bi bi-star-fill"></i></label>

                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label for="star3" title="3 Bintang"><i class="bi bi-star-fill"></i></label>

                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label for="star2" title="2 Bintang"><i class="bi bi-star-fill"></i></label>

                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label for="star1" title="1 Bintang"><i class="bi bi-star-fill"></i></label>
                                    </div>
                                </div>

                                <textarea name="message" rows="3" maxlength="255" class="form-control rounded-3 mb-3"
                                    placeholder="Ceritain pengalaman kamu sewa alat di sini..." required>{{ old('message') }}</textarea>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success rounded-pill px-4">
                                        Kirim Testimoni
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="card border-0 shadow-sm rounded-4 p-4 text-center" data-aos="zoom-in"
                            data-aos-delay="100">
                            <p class="text-muted mb-3">Yuk, login dulu buat bagikan pengalaman mendakimu.</p>
                            <a href="{{ route('login') }}" class="btn btn-outline-success rounded-pill px-4 mx-auto"
                                style="width: fit-content;">
                                Login Sekarang
                            </a>
                        </div>
                    @endauth

                </div>
            </div>

        </div>
    </section>

    {{-- GALERI MOMEN PENDAKI --}}
    <section class="py-5 bg-white" data-aos="fade-in">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Momen Para Pendaki</h2>
            </div>
            <div class="row g-3">
                @foreach (['https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=400&q=80', 'https://images.unsplash.com/photo-1533240332313-0db49b459ad6?auto=format&fit=crop&w=400&q=80', 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=400&q=80', 'https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=400&q=80'] as $i => $foto)
                    <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                        <div class="rounded-4 hover-zoom-img shadow-sm" style="height:220px; overflow:hidden;">
                            <img src="{{ $foto }}" class="w-100 h-100" style="object-fit:cover;"
                                alt="Galeri {{ $i + 1 }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- DROPDOWN JAWABAN PERTANYAAN --}}
    <section class="py-5 bg-light" data-aos="fade-in">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">Pertanyaan yang Sering Diajukan</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        @foreach ([['q' => 'Berapa lama minimal masa sewa alat?', 'a' => 'Minimal sewa adalah 1 hari (24 jam) untuk semua kategori alat.'], ['q' => 'Apakah ada deposit atau jaminan?', 'a' => 'Ya, sistem deposit akan dikembalikan penuh setelah alat kembali dalam kondisi baik.'], ['q' => 'Bagaimana jika alat rusak saat digunakan?', 'a' => 'Kerusakan wajar ditanggung kami. Kerusakan berat dikenakan biaya sesuai ketentuan.'], ['q' => 'Apakah bisa antar-jemput alat?', 'a' => 'Bisa, kami menyediakan layanan antar-jemput untuk area tertentu dengan biaya tambahan.']] as $i => $faq)
                            <div class="accordion-item rounded-3 mb-2 border-0 shadow-sm" data-aos="fade-up"
                                data-aos-delay="{{ $i * 50 }}">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed rounded-3" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}">
                                        {{ $faq['q'] }}
                                    </button>
                                </h2>
                                <div id="faq{{ $i }}" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body small text-muted">{{ $faq['a'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
    </script>
@endsection
