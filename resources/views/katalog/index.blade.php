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
                @forelse ($items as $i => $item)
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="card border-0 shadow-sm rounded-4 h-100 hover-lift">
                            <div class="position-relative rounded-top-4" style="height:220px; overflow:hidden;">
                                <span class="position-absolute top-0 start-0 m-2 badge bg-dark rounded-pill">
                                    {{ $item->category->category_name ?? '-' }}
                                </span>

                                @if ($item->stock > 0)
                                    <span
                                        class="position-absolute top-0 end-0 m-2 badge bg-white text-dark rounded-pill shadow-sm">
                                        <i class="bi bi-check-circle-fill text-success me-1"></i>Tersedia
                                    </span>
                                @else
                                    <span
                                        class="position-absolute top-0 end-0 m-2 badge bg-danger text-white rounded-pill shadow-sm">
                                        <i class="bi bi-x-circle-fill me-1"></i>Habis
                                    </span>
                                @endif

                                <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/500x300' }}"
                                    class="w-100 h-100 rounded-top-4" style="object-fit:cover;"
                                    alt="{{ $item->item_name }}">
                            </div>

                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $item->item_name }}</h6>

                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <i class="bi bi-star-fill text-warning small"></i>
                                            <small class="text-muted">4.9 (120 sewa)</small>
                                        </div>
                                        <small
                                            class="fw-semibold {{ $item->stock > 0 ? 'text-secondary' : 'text-danger' }}">
                                            Stok: {{ $item->stock }}
                                        </small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-2 pt-2 border-top">
                                    <div class="fw-bold text-success">
                                        Rp{{ number_format($item->price_per_day, 0, ',', '.') }} <small
                                            class="text-muted fw-normal">/hari</small>
                                    </div>
                                    @if ($item->stock > 0)
                                        <a href="{{ route('transaction', $item->id) }}"
                                            class="btn btn-sm rounded-pill px-3 btn-success">
                                            Sewa
                                        </a>
                                    @else
                                        <button class="btn btn-sm rounded-pill px-3 btn-secondary" disabled>
                                            Habis
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada alat tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Inisialisasi JS AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
