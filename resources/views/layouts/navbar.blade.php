<style>
    .navbar-glass {
        background-color: rgba(15, 23, 42, .85) !important;
        backdrop-filter: blur(10px);
    }
    
    /* Navigation Link Styling */
    .nav-link {
        transition: all 0.3s ease !important;
    }
    
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.15) !important;
        transform: translateY(-2px);
    }
    
    /* Active Navigation Link */
    .nav-link.active {
        background-color: #ffc107 !important;
        color: #000 !important;
        font-weight: 600;
    }
    
    /* Dropdown Item Styling */
    .dropdown-item {
        transition: all 0.3s ease !important;
        color: #333;
    }
    
    .dropdown-item:hover,
    .dropdown-item:focus {
        background-color: #ffc107 !important;
        color: #000 !important;
        transform: translateX(4px);
    }
    
    .dropdown-item.text-danger:hover {
        background-color: #dc3545 !important;
        color: #fff !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark navbar-glass sticky-top shadow-sm py-2">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('home') }}">
            <i class="bi bi-compass-fill fs-4 text-warning"></i>
            <span>Puncak<span class="text-warning">Outdoor</span></span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link px-3 rounded {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i> Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 rounded {{ request()->routeIs('katalog') ? 'active' : '' }}" 
                        href="{{ route('katalog') }}">
                        <i class="bi bi-bag-check me-1"></i> Katalog Alat
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 rounded {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">
                        <i class="bi bi-info-circle me-1"></i> Syarat & Ketentuan
                    </a>
                </li>

                <!-- Auth / User Dropdown -->
                <li class="nav-item dropdown ms-lg-2">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 btn btn-outline-light border-0 px-3" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5"></i>
                        @auth
                            <span>{{ Auth::user()->name }}</span>
                        @else
                            <span>Akun Saya</span>
                        @endauth
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 p-2 mt-2">
                        @auth
                            <li>
                                <a href="{{ route('transaction.riwayat') }}" class="dropdown-item d-flex align-items-center gap-2 py-2 rounded">
                                    <i class="bi bi-clock-history"></i> Riwayat Transaksi
                                </a>
                            </li>

                            @if (Auth::user()->role === 'admin')
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item d-flex align-items-center gap-2 py-2 rounded">
                                        <i class="bi bi-building-fill-gear"></i> Dashboard Admin
                                    </a>
                                </li>
                            @endif

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger d-flex align-items-center gap-2 py-2 rounded" type="submit">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="dropdown-item d-flex align-items-center gap-2 py-2 rounded">
                                    <i class="bi bi-box-arrow-in-right"></i> Masuk
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="dropdown-item d-flex align-items-center gap-2 py-2 rounded">
                                    <i class="bi bi-person-plus"></i> Daftar
                                </a>
                            </li>
                        @endauth
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>