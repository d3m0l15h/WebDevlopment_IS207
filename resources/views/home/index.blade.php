<!-- ======= Header ======= -->
@extends('layouts.app')
<!-- End Header -->
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/home.css')}}">
<main id="main">
    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero section-1">
        <img src="{{ asset('assets/img/hero-bg.jpg')}}" alt="" data-aos="fade-in" />
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h2 data-aos="fade-up" data-aos-delay="100">
                        Chào mừng dến với
                        <span class="welcome-title main-color">Finding Job.</span>
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="200">
                        Chúng tôi giúp bạn định hướng nghề nghiệp
                    </p>
                </div>
                <div class="col-lg-5">
                    <form action="search.php" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
                        <input type="text" name="e" class="form-control"
                            placeholder="Nhập key word bạn muốn tìm" />
                        <input type="submit" class="btn btn-primary" value="Tìm kiếm" name="key" />
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Clients Section - Home Page -->
    <section id="clients" class="clients">
        <div class="container-fluid" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/img/clients/client-1.png')}}" class="img-fluid" alt="" />
                </div>
                <!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/img/clients/client-2.png')}}" class="img-fluid" alt="" />
                </div>
                <!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{asset('assets/img/clients/client-3.png')}}" class="img-fluid" alt="" />
                </div>
                <!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/img/clients/client-4.png')}}" class="img-fluid" alt="" />
                </div>
                <!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/img/clients/client-5.png')}}" class="img-fluid" alt="" />
                </div>
                <!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('assets/img/clients/client-6.png')}}" class="img-fluid" alt="" />
                </div>
                <!-- End Client Item -->
            </div>
        </div>
    </section>
    <!-- End Clients Section -->

    <!-- About Section - Home Page -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="d-flex flex-column align-items-xl-center gy-5 ">
                <div class="w-100 content text-center mb-4">
                    <h3>Chúng tôi là</h3>
                    <h2>Website hàng đầu đồng hành tìm kếm cùng bạn</h2>
                    <p>
                        Cung cấp đa dạng thông tin về công việc , lĩnh vực . Đem lại cơ hội cho thị trường lao động giàu
                        tiềm năng
                    </p>
                </div>

                <div class="w-100">
                    <div class="d-flex flex-wrap">
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bi bi-buildings"></i>
                                <h3>Uy tín</h3>
                                <p>
                                    Cung cấp thông tin tuyển dụng chính xác, đầy đủ. Các thông tin tuyển dụng được kiểm duyệt kỹ lưỡng trước khi đăng tải.
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Box -->
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bi bi-clipboard-pulse"></i>
                                <h3>Chất lượng</h3>
                                <p>
                                    Cung cấp các dịch vụ chất lượng, đáp ứng nhu cầu của cả nhà tuyển dụng và ứng viên.
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Box -->

                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bi bi-command"></i>
                                <h3>Hiệu quả</h3>
                                <p>
                                    Tìm được công việc, ứng viên phù hợp với nhu cầu và năng lực của mình.
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Stats Section - Home Page -->
    <section id="stats" class="stats">
        <img src="{{ asset('assets/img/stats-bg.jpg')}}" alt="" data-aos="fade-in" />

        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{$users + $emps}}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Khách hàng</p>
                    </div>
                </div>
                <!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{$jobs}}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Cơ hội</p>
                    </div>
                </div>
                <!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{$emps}}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Doanh Nghiệp</p>
                    </div>
                </div>
                <!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{$users}}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Ứng viên</p>
                    </div>
                </div>
                <!-- End Stats Item -->
            </div>
        </div>
    </section>
    <!-- End Stats Section -->

    <!-- Features Section - Home Page -->

    <!-- End Features Section -->

    <!-- Portfolio Section - Home Page -->

    <!-- End Portfolio Section -->

    <!-- Pricing Section - Home Page -->

    <!-- End Pricing Section -->

    <!-- Faq Section - Home Page -->
    <!-- End Faq Section -->

    <!-- Team Section - Home Page -->
    <!-- End Team Section -->

    <!-- Call-to-action Section - Home Page -->

    <!-- End Call-to-action Section -->

    <!-- Testimonials Section - Home Page -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                    <h3>Phản hồi tích cực</h3>
                    <p>
                        Hàng trăm khách hàng đã tìm kiếm thành công công việc tốt. Từ đó FYJ nhận được những đánh giá
                        tích cực, cộng đồng FYJ ngày càng đông đảo người ủng hộ.
                    </p>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper">
                        <template class="swiper-config">
                            { "loop": true, "speed" : 600, "autoplay": { "delay": 5000 },
                            "slidesPerView": "auto", "pagination": { "el":
                            ".swiper-pagination", "type": "bullets", "clickable": true } }
                        </template>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{asset('assets/img/testimonials/testimonials-1.jpg')}}"
                                            class="testimonial-img flex-shrink-0" alt="" />
                                        <div>
                                            <h3>Saul Goodman</h3>
                                            <h4>Ceo & Founder</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>
                                            Giao diện trang web Finding Job được thiết kế đơn giản, dễ nhìn, dễ sử dụng. Các tính năng được bố trí khoa học, giúp người dùng dễ dàng tìm thấy thông tin mình cần.
                                        </span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                            <!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/testimonials/testimonials-2.jpg')}}"
                                            class="testimonial-img flex-shrink-0" alt="" />
                                        <div>
                                            <h3>Sara Wilsson</h3>
                                            <h4>Designer</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>
                                            Đội ngũ hỗ trợ của Finding Job luôn sẵn sàng giải đáp thắc mắc của người dùng một cách nhiệt tình và chuyên nghiệp. Điều này giúp người dùng có thể sử dụng trang web một cách hiệu quả nhất.
                                        </span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                            <!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/testimonials/testimonials-3.jpg')}}"
                                            class="testimonial-img flex-shrink-0" alt="" />
                                        <div>
                                            <h3>Jena Karlis</h3>
                                            <h4>Store Owner</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Trang web Finding Job được trang bị hệ thống bảo mật hiện đại, đảm bảo an toàn thông tin cho người dùng. Điều này giúp người dùng có thể yên tâm khi sử dụng trang web.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                            <!-- End testimonial item -->

                            
                            <!-- End testimonial item -->

                          
                            <!-- End testimonial item -->
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- Recent-posts Section - Home Page -->

    <!-- End Recent-posts Section -->
    <div class="section-top-client section-title container">
        <h2>Top Nhà tuyển dụng</h2>
        <div class="swiper mySwiper section-intro">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-1.png')}}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-2.png')}}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-3.png')}}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-4.png')}}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-5.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section - Home Page -->
    <section id="contact" class="contact">
        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>
                Liên hệ với chúng tôi để được hỗ trợ tận tâm , nhiệt tình
            </p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Địa chỉ</h3>
                                <p>93/3 Hoàng Diệu</p>
                                <p>Thủ Đức, Hồ Chí Minh</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Liên hệ</h3>
                                <p>+84 865 904 101</p>
                                <p>+84 829 250 703</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email</h3>
                                <p>findingjob@gmail.com</p>
                                <p>fjcontact@example.com</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="500">
                                <i class="bi bi-clock"></i>
                                <h3>Mở cửa</h3>
                                <p>Monday - Friday</p>
                                <p>9:00AM - 05:00PM</p>
                            </div>
                        </div>
                        <!-- End Info Item -->
                    </div>
                </div>

                <div class="col-lg-6">
                    <form action="{{route('contact')}}" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text"` name="name" class="form-control" placeholder="Tên của bạn"
                                    required />
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    required />
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Tiều đề"
                                    required />
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="content" rows="6" placeholder="Nội dung" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your message has been sent. Thank you!
                                </div>

                                <button type="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
</main>


<!-- ======= Footer ======= -->
@endsection
<!-- End Footer -->
