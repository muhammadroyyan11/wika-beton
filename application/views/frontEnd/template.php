<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>MC2 WIKA</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/front/img/wika/LOGO_MC_2_FIX.png" rel="icon" />
    <link href="<?= base_url() ?>assets/front/img/wika/LOGO_MC_2_FIX.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/front/vendor/aos/aos.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/front/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo">
                <a href="index.html" class="logo"><img src="<?= base_url() ?>assets/front/img/wika/LOGO_MC_2_FIX.png"
                        alt="" /></a>
                <a href="index.html">MC2 <span>WIKA</span></a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == '' ? 'class="nav-link scrollto active"' : 'nav-link scrollto' ?> href="home">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a <?= $this->uri->segment(1) == 'company' || $this->uri->segment(1) == 'home#about' ? 'class="nav-link scrollto active"' : 'nav-link scrollto' ?> role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Perusahaan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= site_url('home#about') ?>">Tentang Perusahaan</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('company') ?>">Struktur Perusahaan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a <?= $this->uri->segment(1) == 'product' || $this->uri->segment(1) == '' ? 'class="nav-link scrollto active"' : 'nav-link scrollto' ?> href="<?= site_url('product') ?>">Produk &
                            Jasa</a>
                    </li>
                    <li>
                        <a <?= $this->uri->segment(1) == 'portfolio' || $this->uri->segment(1) == '' ? 'class="nav-link scrollto active"' : 'nav-link scrollto' ?> href="<?= site_url('portfolio') ?>">Portfolio</a>
                    </li>
                    <li>
                        <a <?= $this->uri->segment(1) == 'contact' || $this->uri->segment(1) == '' ? 'class="nav-link scrollto active"' : 'nav-link scrollto' ?> href="<?= site_url('contact') ?>">Hubungi
                            Kami</a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
            <a href="<?= site_url('auth') ?>" class="btn btn-primary w-200">
                Login
            </a>
        </div>
    </header>
    <!-- End Header -->
    <?= $contents ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container footer-maps" style="width: 80%;">
            <iframe class="mb-4 mb-lg-0 rounded-5"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1634035798356!2d106.87440221744386!3d-6.242184299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3232a5eb1b5%3A0x3e5f3684ce6774b5!2sPT%20Wijaya%20Karya%20(Persero)%20Tbk!5e0!3m2!1sen!2sid!4v1696154654814!5m2!1sen!2sid"
                frameborder="0" style="border: 0; width: 100%; height: 384px" allowfullscreen></iframe>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>MC2 WIKA<span>.</span></h3>
                        <p>
                            A108 Adam Street <br />
                            New York, NY 535022<br />
                            United States <br /><br />
                            <strong>Phone:</strong> +1 5589 55488 55<br />
                            <strong>Email:</strong> info@example.com<br />
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">About us</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Services</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Terms of service</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Privacy policy</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Web Design</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Web Development</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Product Management</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Marketing</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Graphic Design</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>
                            Cras fermentum odio eu feugiat lide par naso tierra
                            videa magna derita valies
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>MC2 WIKA</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by
                <a href="#">Bisa Karya</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets/front/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/front/js/main.js"></script>

    <!-- JS File -->
    <script src="<?= base_url() ?>assets/front/js/form.js"></script>
</body>

</html>