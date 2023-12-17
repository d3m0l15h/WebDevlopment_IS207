<!DOCTYPE html>
<html lang2="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>FindingJob.</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "preventDuplicates": true,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "1000",
            "extendedTimeOut": "1000",
        }
    </script>
    <!-- =======================================================
  * Template Name: Append
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">
    <header id="header" class="header fixed-top d-flex align-items-center ">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Find Your Job</h1>
                <span>.</span>
            </a>

            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Trang chủ</a></li>
                    <li><a href="{{ route('jobs') }}">Tìm việc làm</a></li>
                    <li class="dropdown has-dropdown">
                        <a href="javascript:void(0);"><span>Công Việc</span> <i class="bi bi-chevron-down"></i></a>
                        <ul class="dd-box-shadow">
                            <li class="dropdown has-dropdown">
                                <a href="javascript:void(0);"><span>Theo kĩ năng</span>
                                    <i class="bi bi-chevron-down"></i></a>
                                <ul class="dd-box-shadow">
                                    <li><a href="#">Theo kĩ năng</a></li>
                                    <li><a href="#">Java </a></li>
                                    <li><a href="#">.NET </a></li>
                                    <li><a href="#">Python</a></li>
                                    <li><a href="#">React</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Theo kinh nghiệm</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('home') }}#contact">Contact</a></li>
                </ul>

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <!-- End Nav Menu -->
            <div class="header-button-group d-flex  flex-row gap-3 ">
                <div class="user-info">
                    <nav id="navmenu" class="navmenu">
                        <ul>
                            <li class="dropdown has-dropdown">
                                <div class="d-flex flex-row justify-align-content-around align-items-center ">
                                    @if (auth()->user()->role == 'user')
                                        <img src="{{ asset(auth()->user()->user->avatar) }}" alt=""
                                            class="">
                                    @elseif (auth()->user()->role == 'employer')
                                        <img src="{{ asset(auth()->user()->employer->logo) }}" alt=""
                                            class="">
                                    @else
                                        <img src="{{ asset('assets/img/blog/blog-author-2.jpg') }}" alt=""
                                            class="">
                                    @endif
                                    <a href=""
                                        class="text-light fw-bold m-0 gap-2 ">{{ auth()->user()->username }}</a>
                                </div>


                                <ul class="dd-box-shadow text-end">
                                    @if (auth()->user()->role == 'user')
                                        <li><a href="{{ route('profile') }}">Hồ sơ của tôi</a></li>
                                        <li><a href="{{ route('user.applied') }}">Công việc của tôi</a></li>
                                    @endif
                                    @if (auth()->user()->role == 'employer')
                                        <li><a href="{{ route('profile') }}">Hồ sơ của tôi</a></li>
                                        <li><a href="{{ route('job.create') }}">Đăng tin tuyển dụng</a></li>
                                        <li><a href="{{ route('employer.manage_jobs') }}">Danh Sách Công Việc</a></li>
                                        <li><a href="{{ route('employer.manage_applies') }}">Danh Sách Ứng Viên</a></li>
                                    @endif
                                    @if (auth()->user()->role == 'admin')
                                        <li><a href="{{ route('admin.request') }}">Yêu cầu làm Nhà Tuyển Dụng</a></li>
                                        <li><a href="{{ route('admin.dashboard') }}">Quản Trị Viên</a></li>
                                        <li><a href="{{ route('admin.employer') }}">Quản Lý Nhà Tuyển Dụng</a></li>
                                        <li><a href="{{ route('admin.user') }}">Quản Lý Người Lao Động</a></li>
                                    @endif
                                    <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>

                        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                    </nav>
                </div>
                <div
                    class="user-info d-flex flex-row justify-content-center align-items-center text-light fw-bold gap-2">
                    <a href="#">
                        VI
                    </a>
                    <span> / </span>
                    <a href="#">
                        EN
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
