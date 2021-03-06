<!--? Shop Method Start-->
<div class="shop-method-area">
    <div class="container">
        <div class="method-wrapper">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-ruler-alt"></i>
                        <h6><?= $kursusIsoku['title']; ?></h6>
                        <p><?= $kursusIsoku['content']; ?></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-shine"></i>
                        <h6><?= $pelatihanIsoku['title']; ?></h6>
                        <p><?= $pelatihanIsoku['content']; ?></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-cut"></i>
                        <h6><?= $tempahanIsoku['title']; ?></h6>
                        <p><?= $tempahanIsoku['content']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Method End-->
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="assets/img/logo/logo_isoku.png" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Lembaga Kursus dan Pelatihan yang berbasis di Medan, Sumatera Utara.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Navigasi Cepat</h4>
                            <ul>
                                <li><a href="<?= base_url('about'); ?>">Tentang</a></li>
                                <li><a href="<?= base_url('shop'); ?>"> Produk</a></li>
                                <li><a href="<?= base_url('contact'); ?>"> Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Layanan dan Bantuan</h4>
                            <ul>
                                <li><a href="#">Frequently Asked Questions</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-8 col-md-7">
                    <div class="footer-copy-right">
                        <p>Copyright <?= date('Y'); ?> All rights reserved | Lembaga Kursus dan Pelatihan Isoku</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-5">
                    <div class="footer-copy-right f-right">
                        <!-- social -->
                        <div class="footer-social">
                            <a href="https://www.facebook.com/dhafa.ghifary.16" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/isokushop/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://shopee.co.id/isokushop" target="_blank"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- JS here -->

<script src="<?= base_url('assets/') ?>js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= base_url('assets/') ?>js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= base_url('assets/') ?>js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= base_url('assets/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/') ?>js/slick.min.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="<?= base_url('assets/') ?>js/wow.min.js"></script>
<script src="<?= base_url('assets/') ?>js/animated.headline.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="<?= base_url('assets/') ?>js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="<?= base_url('assets/') ?>js/contact.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.form.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/') ?>js/mail-script.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?= base_url('assets/') ?>js/plugins.js"></script>
<script src="<?= base_url('assets/') ?>js/main.js"></script>

</body>

</html>