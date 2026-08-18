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
            <div class="text-center mb-4">
                <h2 class="fw-bold">KATALOG ALAT PENDAKIAN</h2>
                <p class="text-muted col-md-6 mx-auto">Alat favorit para pendaki, kualitas terjamin.</p>
            </div>
            <!-- Form Filter & Sortir -->
            <form action="{{ url()->current() }}" method="GET"
                class="row g-2 justify-content-between align-items-center mb-5 bg-white p-3 rounded-4 shadow-sm">
                <!-- Filter Kategori (Tombol Pill) -->
                <div class="col-md-8 d-flex flex-wrap gap-2">
                    <a href="{{ request()->fullUrlWithQuery(['category_id' => null]) }}"
                        class="btn btn-sm rounded-pill {{ !request('category_id') ? 'btn-dark' : 'btn-outline-secondary' }}">
                        Semua
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ request()->fullUrlWithQuery(['category_id' => $cat->id]) }}"
                            class="btn btn-sm rounded-pill {{ request('category_id') == $cat->id ? 'btn-dark' : 'btn-outline-secondary' }}">
                            {{ $cat->category_name }}
                        </a>
                    @endforeach
                </div>

                <!-- Dropdown Sortir Harga -->
                <div class="col-md-4 col-lg-3">
                    <!-- Simpan category_id yang sedang aktif agar tidak hilang saat sortir diubah -->
                    @if (request('category_id'))
                        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                    @endif

                    <select name="sort" class="form-select form-select-sm rounded-pill border-secondary-subtle"
                        onchange="this.form.submit()">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga: Terendah ke
                            Tertinggi</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga: Tertinggi
                            ke Terendah</option>
                    </select>
                </div>
            </form>
            <div class="row g-4">
                @forelse ($items as $i => $item)
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="card border-0 shadow-sm rounded-4 h-100 hover-lift overflow-hidden">
                            <!-- Wrapper Gambar & Badge -->
                            <div class="position-relative" style="height: 200px;">
                                <!-- Badge Kategori -->
                                <span
                                    class="position-absolute top-0 start-0 m-3 badge bg-dark bg-opacity-75 backdrop-blur rounded-pill z-1">
                                    {{ $item->category->category_name ?? '-' }}
                                </span>

                                <!-- Badge Status Stok -->
                                @if ($item->stock > 0)
                                    <span
                                        class="position-absolute top-0 end-0 m-3 badge bg-white text-dark rounded-pill shadow-sm z-1">
                                        <i class="bi bi-check-circle-fill text-success me-1"></i>Tersedia
                                    </span>
                                @else
                                    <span
                                        class="position-absolute top-0 end-0 m-3 badge bg-danger text-white rounded-pill shadow-sm z-1">
                                        <i class="bi bi-x-circle-fill me-1"></i>Habis
                                    </span>
                                @endif

                                <!-- Gambar Produk -->
                                <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/500x300' }}"
                                    class="w-100 h-100 style="object-fit: cover;" alt="{{ $item->item_name }}">
                            </div>

                            <!-- Konten Card -->
                            <div class="card-body d-flex flex-column justify-content-between p-3">
                                <h5 class="card-title fw-bold text-dark text-truncate mb-2" title="{{ $item->item_name }}">
                                    {{ $item->item_name }}
                                </h5>

                                <!-- Footer Card: Harga & Tombol Aksi -->
                                <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-auto">
                                    <div>
                                        <div class="fw-bold text-success fs-5">
                                            Rp{{ number_format($item->price_per_day, 0, ',', '.') }}
                                        </div>
                                        <small class="text-muted">/ hari</small>
                                    </div>

                                    @if ($item->stock > 0)
                                        <a href="{{ route('transaction', $item->id) }}"
                                            class="btn btn-sm btn-success rounded-pill px-3 shadow-sm">
                                            Sewa
                                        </a>
                                    @else
                                        <button class="btn btn-sm btn-secondary rounded-pill px-3" disabled>
                                            Habis
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">Belum ada barang yang tersedia.</p>
                    </div>
                @endforelse
            </div>

        </div>
        </div>
    </section>

    <!-- Inisialisasi JS AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
