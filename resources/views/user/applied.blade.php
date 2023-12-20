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
                                        <img src="{{ asset($apply->job->employer->logo) }}" alt=""
                                            class="w-100 ">
                                    </div>
                                    <div class="info-container ms-4 " style="overflow: hidden; max-width: 500px;">
                                        <a href="{{ route('job.detail', ['slug' => Str::slug($apply->job->name) . '-' . $apply->job->id]) }}">
                                            <h3 style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">{{ $apply->job->name }}</h3>
                                        </a>
                                        <a href="{{ route('profile.company', ['slug' => Str::slug($apply->job->employer->name) . '-' . $apply->job->eid]) }}"><p>{{ $apply->job->employer->name }}</p></a>
                                    </div>

                                    <div class="info-container ms-4 text-end flex-grow-1 d-flex justify-content-center align-items-center">
                                        @if ($apply->status == '2')
                                            <span class="badge bg-success p-3">Đã Chấp Nhận</span>
                                        @elseif($apply->status == '3')
                                            <span class="badge bg-danger">Đã Từ Chối</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section><!-- End Blog-details Section -->

    </main>
@endsection
