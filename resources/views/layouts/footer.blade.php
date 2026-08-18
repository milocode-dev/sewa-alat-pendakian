<!-- ================= FOOTER ================= -->
<style>
    .custom-footer {
        background: #0f172a;
        color: rgba(255,255,255,.75);
        border-top: 1px solid rgba(255,255,255,.08);
        font-size: 0.875rem;
    }

    .custom-footer .brand-icon {
        color: #d97706;
    }

    .custom-footer a {
        color: rgba(255,255,255,.75);
        text-decoration: none;
        transition: .2s;
    }

    .custom-footer a:hover {
        color: #d97706;
    }

    .footer-social a {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        transition: .2s;
        font-size: 0.9rem;
    }

    .footer-social a:hover {
        background: #d97706;
        color: #fff;
    }
</style>

<footer class="custom-footer py-3">
    <div class="container">
        <div class="row align-items-center gy-3">
            
            <!-- Brand & Socials -->
            <div class="col-md-4 d-flex align-items-center gap-3 justify-content-center justify-content-md-start">
                <h5 class="fw-bold mb-0 text-white d-flex align-items-center gap-2">
                    <i class="bi bi-compass-fill brand-icon"></i>
                    Puncak<span class="text-warning">Outdoor</span>
                </h5>
                <div class="footer-social d-flex gap-1 ms-2">
                    <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <!-- Navigasi Utama (Horizontal Compact) -->
            <div class="col-md-5">
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="#">Katalog</a>
                    <a href="#">Syarat & Ketentuan</a>
                    <a href="#">FAQ</a>
                    <a href="#">Kontak</a>
                </div>
            </div>

            <!-- Copyright -->
            <div class="col-md-3 text-center text-md-end text-muted small">
                © 2026 <strong class="text-white">PuncakOutdoor</strong>
            </div>

        </div>
    </div>
</footer>