<!-- ================= FOOTER ================= -->
<style>
    .custom-footer {
        background: #0f172a;
        color: rgba(255,255,255,.75);
        border-top: 1px solid rgba(255,255,255,.08);
    }

    .custom-footer h5,
    .custom-footer h6 {
        color: #fff;
        font-weight: 600;
    }

    .custom-footer .brand-icon {
        color: #d97706;
    }

    .custom-footer a {
        color: rgba(255,255,255,.75);
        text-decoration: none;
        transition: .25s;
    }

    .custom-footer a:hover {
        color: #d97706;
        padding-left: 4px;
    }

    .footer-social a {
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        transition: .3s;
        font-size: 1.1rem;
    }

    .footer-social a:hover {
        background: #d97706;
        color: #fff;
        transform: translateY(-3px);
    }

    .footer-bottom {
        border-top: 1px solid rgba(255,255,255,.08);
        color: rgba(255,255,255,.55);
        font-size: .9rem;
    }
</style>

<footer class="custom-footer pt-5">

    <div class="container">

        <div class="row gy-4">

            <!-- Brand -->
            <div class="col-lg-4">
                <h4 class="fw-bold d-flex align-items-center gap-2 mb-3">
                    <i class="bi bi-compass-fill brand-icon"></i>
                    Puncak<span class="text-warning">Outdoor</span>
                </h4>

                <p>
                    Penyedia jasa sewa perlengkapan outdoor yang lengkap,
                    berkualitas, dan siap menemani setiap perjalanan
                    pendakian maupun camping Anda.
                </p>

                <div class="footer-social d-flex gap-2 mt-4">
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- Menu -->
            <div class="col-lg-2 col-md-6">
                <h6 class="mb-3">Menu</h6>

                <div class="d-flex flex-column gap-2">
                    <a href="#">Home</a>
                    <a href="#">Katalog</a>
                    <a href="#">Booking</a>
                    <a href="#">Tentang Kami</a>
                </div>
            </div>

            <!-- Bantuan -->
            <div class="col-lg-3 col-md-6">
                <h6 class="mb-3">Bantuan</h6>

                <div class="d-flex flex-column gap-2">
                    <a href="#">Syarat & Ketentuan</a>
                    <a href="#">FAQ</a>
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Kontak</a>
                </div>
            </div>

            <!-- Kontak -->
            <div class="col-lg-3">
                <h6 class="mb-3">Hubungi Kami</h6>

                <p class="mb-2">
                    <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                    Metro, Lampung
                </p>

                <p class="mb-2">
                    <i class="bi bi-telephone-fill text-warning me-2"></i>
                    +62 812-3456-7890
                </p>

                <p class="mb-0">
                    <i class="bi bi-envelope-fill text-warning me-2"></i>
                    info@puncakoutdoor.id
                </p>
            </div>

        </div>

        <!-- Bottom -->
        <div class="footer-bottom mt-5 py-4 d-flex flex-column flex-md-row justify-content-between align-items-center">

            <span>
                © 2026 <strong class="text-white">PuncakOutdoor</strong>.
                All Rights Reserved.
            </span>

            <span>
                Made with <i class="bi bi-heart-fill text-danger"></i> using Bootstrap
            </span>

        </div>

    </div>

</footer>