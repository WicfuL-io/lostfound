<!-- Footer -->
<footer class="footer mt-5">

    <div class="container">

        <div class="row gy-4">

            <!-- Logo -->
            <div class="col-lg-4">

                <div class="d-flex align-items-center mb-3">

                    <div class="logo-box me-3">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>

                    <div>

                        <h4 class="mb-0 fw-bold text-white">
                            Lost & Found
                        </h4>

                        <small class="text-light">
                            Kampus
                        </small>

                    </div>

                </div>

                <p class="footer-text">
                    Sistem informasi Lost & Found Kampus membantu mahasiswa
                    melaporkan barang hilang maupun barang ditemukan dengan
                    cepat, mudah, dan aman.
                </p>

            </div>

            <!-- Menu -->
            <div class="col-lg-2">

                <h5 class="footer-title">
                    Menu
                </h5>

                <ul class="footer-menu">

                    <li>
                        <a href="<?= base_url('/') ?>">Home</a>
                    </li>

                    <li>
                        <a href="#">Barang Hilang</a>
                    </li>

                    <li>
                        <a href="#">Barang Ditemukan</a>
                    </li>

                    <li>
                        <a href="#">Kategori</a>
                    </li>

                </ul>

            </div>

            <!-- Bantuan -->
            <div class="col-lg-3">

                <h5 class="footer-title">
                    Bantuan
                </h5>

                <ul class="footer-menu">

                    <li>
                        <a href="#">
                            Cara Melapor
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            FAQ
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Kontak Admin
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Kontak -->
            <div class="col-lg-3">

                <h5 class="footer-title">
                    Hubungi Kami
                </h5>

                <p class="footer-contact">

                    <i class="bi bi-envelope-fill"></i>

                    admin@kampus.ac.id

                </p>

                <p class="footer-contact">

                    <i class="bi bi-telephone-fill"></i>

                    +62 812-3456-7890

                </p>

                <div class="social-icon mt-3">

                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-youtube"></i>
                    </a>

                </div>

            </div>

        </div>

        <hr class="footer-line">

        <div class="text-center">

            <p class="copyright">

                © <?= date('Y') ?>

                Lost & Found Kampus.

                All Rights Reserved.

            </p>

        </div>

    </div>

</footer>

<!-- Back To Top -->
<button id="backToTop">

    <i class="bi bi-arrow-up"></i>

</button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
    AOS.init({
        duration: 700,
        once: true
    });
</script>

<!-- JS -->
<script src="<?= base_url('assets/js/script.js'); ?>"></script>

</body>

</html>