@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/cv.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile-nav.css') }}">
    <main id="main blog-details">

        <!-- Blog Details Page Title & Breadcrumbs -->
        <div data-aos="fade" class="page-title">
            <div class="heading">

            </div>
        </div><!-- End Page Title -->

        <!-- Blog-details Section - Blog Details Page -->
        <div class="container profile-nav d-flex flex-row justify-content-start ">
            <a href="{{ route('profile') }}" class="fs-5 ">
                Thông tin
            </a>
            <a href="{{ route('user.applied') }}" class="fs-5 active">
                Công việc
            </a>
        </div>
        <section id="blog-details" class="blog-details">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5 d-flex position-relative justify-content-center gap-2">
                    <div class="col-lg-3 box-content box-sidebar">
                        <div class="sidebar box">
                            <h3>Thông kê</h3>
                            <ul class="list-group list-group-flush mt-4 ">
                                <li class="list-group-item">
                                    <p>Kinh nghiệm</p>
                                    <h3 class="main-color text-center">{{ $experience }}</h3>
                                </li>
                            </ul>
                        </div><!-- End Sidebar -->

                    </div>
                    <div class="col-lg-8 box-content">
                        @foreach ($applies as $apply)
                            <div class="box">
                                <div class="content d-flex flex-row">
                                    <div class="avatar-containter d-flex ">
                                        <img src="{{ asset('assets/img/blog/blog-author-2.jpg') }}" alt=""
                                            class="w-100 ">
                                    </div>
                                    <div class="info-container ms-4 ">
                                        <h3>{{$apply->job->name}}</h3>
                                        <p>{{$apply->job->employer->name}}</p>
                                    </div>  

                                    {{-- <div class="info-container ms-4 text-end flex-grow-1 ">
                                        <h3>2020 - 2022</h3>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section><!-- End Blog-details Section -->

    </main>
@endsection
