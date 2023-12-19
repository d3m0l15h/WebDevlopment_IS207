<footer id="footer" class="footer">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="{{route('home')}}" class="logo d-flex align-items-center me-auto me-xl-0">
                    <h1>Finding Job</h1>
                    <span class="special-dot">.</span>
                </a>
    
                <p>
                    Kết nối việc làm, kiến tạo tương lai
                </p>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="{{ route('jobs') }}">Jobs</a></li>
                    <li><a href="{{ route('home') }}#contact">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Liên hệ với chung tôi</h4>
                <p>93/3 Hoàng Diệu</p>
                <p>Phường Linh Trung, Thủ Đức, Thành phố Hồ Chí Minh
                </p>
                <p>Việt Nam</p>
                <p class="mt-4">
                    <strong>Phone:</strong> <span>+84 0865 904 101</span>
                </p>
                <p><strong>Email:</strong> <span>findjob@gmail.com</span></p>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>
            &copy; <span>Copyright</span> <strong class="px-1">Finding Job.</strong>
            <span>All Rights Reserved</span>
        </p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">G10</a>
        </div>
    </div>
</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<!-- Vendor JS Files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/home.js') }}"></script>

</body>

</html>
