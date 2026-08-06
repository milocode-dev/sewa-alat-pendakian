<style>
    /* Cuma efek yang Bootstrap gak punya utility-nya */
    .navbar-glass {
        background-color: rgba(15, 23, 42, .85) !important;
        backdrop-filter: blur(10px);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark navbar-glass sticky-top shadow-sm py-3">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('home') }}">
            <i class="bi bi-compass-fill fs-4 text-warning"></i>
            Puncak<span class="text-warning">Outdoor</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-2 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link rounded {{ request()->routeIs('home') ? 'active bg-white bg-opacity-10' : '' }}"
                        href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i> Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link rounded {{ request()->routeIs('about') ? 'active bg-white bg-opacity-10' : '' }}"
                        href="{{ route('about') }}">
                        <i class="bi bi-info-circle me-1"></i> Syarat & Ketentuan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-warning fw-semibold rounded-pill px-3" href="{{ route('katalog') }}">
                        <i class="bi bi-bag-check-fill me-1"></i> Katalog Alat
                    </a>
                </li>
     

                <!-- Auth dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5"></i>
                        @auth
                            <span>Selamat datang, <strong>{{ Auth::user()->name }}</strong></span>
                        @else
                            <span>Masuk / Daftar</span>
                        @endauth
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 p-2">
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item d-flex align-items-center gap-2 py-2">
                                        <i class="bi bi-building-fill-gear"></i> Dashboard Admin
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger d-flex align-items-center gap-2 py-2" type="submit">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="dropdown-item d-flex align-items-center gap-2 py-2">
                                    <i class="bi bi-box-arrow-in-right"></i> Masuk
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="dropdown-item d-flex align-items-center gap-2 py-2">
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