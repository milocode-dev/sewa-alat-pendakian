@extends('layouts.app')

@section('content')
    <!-- CDN Bootstrap Icons & Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12) !important;
        }
    </style>

    <section class="py-5 bg-light" id="katalog" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">KATALOG ALAT PENDAKIAN</h2>
                <p class="text-muted col-md-6 mx-auto">Alat favorit para pendaki, kualitas terjamin.</p>
            </div>

            <div class="row g-4">
                @php
                    $produkPopuler = [
                        [
                            'nama' => 'Tenda Dome 4P',
                            'kategori' => 'Tenda',
                            'harga' => '35.000',
                            'rating' => '4.9',
                            'stok' => 5, // Tambahan field stok
                            'img' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=500&q=80',
                        ],
                        [
                            'nama' => 'Carrier 60L',
                            'kategori' => 'Carrier',
                            'harga' => '25.000',
                            'rating' => '4.8',
                            'stok' => 2, // Tambahan field stok
                            'img' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=500&q=80',
                        ],
                        [
                            'nama' => 'Kompor Portable',
                            'kategori' => 'Masak',
                            'harga' => '15.000',
                            'rating' => '4.7',
                            'stok' => 0, // Contoh jika stok habis
                            'img' => 'https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?auto=format&fit=crop&w=500&q=80',
                        ],
                        [
                            'nama' => 'Sleeping Bag',
                            'kategori' => 'Tidur',
                            'harga' => '20.000',
                            'rating' => '4.9',
                            'stok' => 8, // Tambahan field stok
                            'img' => 'https://images.unsplash.com/photo-1445307806294-bff7f67ff225?auto=format&fit=crop&w=500&q=80',
                        ],
                    ];
                @endphp

                @foreach ($produkPopuler as $i => $produk)
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="card border-0 shadow-sm rounded-4 h-100 hover-lift">
                            <div class="position-relative rounded-top-4" style="height:220px; overflow:hidden;">
                                <!-- Badge Kategori di Pojok Kiri -->
                                <span class="position-absolute top-0 start-0 m-2 badge bg-dark rounded-pill">{{ $produk['kategori'] }}</span>
                                
                                <!-- Dynamic Badge Status di Pojok Kanan -->
                                @if($produk['stok'] > 0)
                                    <span class="position-absolute top-0 end-0 m-2 badge bg-white text-dark rounded-pill shadow-sm">
                                        <i class="bi bi-check-circle-fill text-success me-1"></i>Tersedia
                                    </span>
                                @else
                                    <span class="position-absolute top-0 end-0 m-2 badge bg-danger text-white rounded-pill shadow-sm">
                                        <i class="bi bi-x-circle-fill me-1"></i>Habis
                                    </span>
                                @endif

                                <img src="{{ $produk['img'] }}" class="w-100 h-100 rounded-top-4" style="object-fit:cover;" alt="{{ $produk['nama'] }}">
                            </div>

                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $produk['nama'] }}</h6>
                                    
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <i class="bi bi-star-fill text-warning small"></i>
                                            <small class="text-muted">{{ $produk['rating'] }} (120 sewa)</small>
                                        </div>

                                        <!-- Penunjuk Sisa Stok -->
                                        <small class="fw-semibold {{ $produk['stok'] > 0 ? 'text-secondary' : 'text-danger' }}">
                                            Stok: {{ $produk['stok'] }}
                                        </small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-2 pt-2 border-top">
                                    <div class="fw-bold text-success">
                                        Rp{{ $produk['harga'] }} <small class="text-muted fw-normal">/hari</small>
                                    </div>
                                    
                                    <!-- Button otomatis disable jika stok habis -->
                                    <button class="btn btn-sm rounded-pill px-3 {{ $produk['stok'] > 0 ? 'btn-success' : 'btn-secondary' }}" 
                                            {{ $produk['stok'] == 0 ? 'disabled' : '' }}>
                                        {{ $produk['stok'] > 0 ? 'Sewa' : 'Habis' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Inisialisasi JS AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection