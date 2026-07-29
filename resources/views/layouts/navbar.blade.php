<!-- Custom CSS khusus Navbar (Bisa ditaruh di <style> layouts/app.blade.php) -->
<style>
    .custom-navbar {
        background-color: rgba(15, 23, 42, 0.9) !important;
        /* Dark Slate Semi-Transparan */
        backdrop-filter: blur(10px);
        /* Efek Kaca (Glassmorphism) */
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .navbar-brand {
        font-size: 1.25rem;
        letter-spacing: 0.5px;
    }

    .navbar-brand i {
        color: #d97706;
        /* Amber Accent */
    }

    .custom-navbar .nav-link {
        color: rgba(255, 255, 255, 0.8) !important;
        font-weight: 500;
        padding: 8px 16px !important;
        transition: all 0.2s ease-in-out;
        border-radius: 6px;
    }

    .custom-navbar .nav-link:hover,
    .custom-navbar .nav-link.active {
        color: #ffffff !important;
        background-color: rgba(255, 255, 255, 0.08);
    }

    .btn-booking {
        background-color: #d97706;
        color: #ffffff !important;
        font-weight: 600;
        padding: 8px 18px !important;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn-booking:hover {
        background-color: #b45309;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(217, 119, 6, 0.3);
    }
</style>

<!-- Tag Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar sticky-top shadow-sm py-3">
    <div class="container">
        <!-- Brand / Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
            <i class="bi bi-compass-fill fs-4"></i>
            <span>Puncak<span class="text-warning">Outdoor</span></span>
        </a>

        <!-- Tombol Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Link -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1 mt-3 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="bi bi-house-door me-1"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-grid me-1"></i> Katalog Alat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-info-circle me-1"></i> Syarat & Ketentuan</a>
                </li>
                <!-- Tombol CTA -->
                <li class="nav-item ms-lg-2">
                    <a class="nav-link btn-booking" href="#">
                        <i class="bi bi-bag-check-fill me-1"></i> Sewa /
                        Booking
                    </a>
                </li>



                {{-- Fitur LOGOUT --}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-5"></i>
                        <span>Selamat datang, <strong>{{ Auth::user()?->name }}</strong></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </div>
</nav>
