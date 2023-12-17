@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-user.css') }}">
    <main id="main blog-details">
        <section id="blog-details" class="blog-details">
            <div class="" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5 d-flex position-relative justify-content-center gap-2">
                    <div class="col-lg-2 box-content box-sidebar">
                        @include('layouts.admin_sidebar')
                    </div>
                    <div class="col-lg-8  box-content">
                        <div class="box">
                            <h3>Employeer</h3>
                            <div class="view-content p-4">
                                <form class="input-group flex-nowrap mb-4 " action="{{ route('admin.employer') }}"
                                    method="GET">
                                    <span class="input-group-text" id="addon-wrapping"></span>
                                    <input name="search" type="text" class="form-control" placeholder="Username or Email"
                                        aria-label="Username" aria-describedby="addon-wrapping">
                                </form>
                                <div class="w-100 user-container d-flex flex-wrap">
                                    @foreach ($emps as $emp)
                                        <div class="row w-100">
                                            <div class="col a-box rounded-4 p-4 item-user w-50 position-relative"
                                                style="border-radius: 12px;">
                                                <div class="position-absolute end-0 mt-1 me-4">
                                                    <a class="btn btn-secondary bg-color"
                                                        href="{{route('admin.employer_status', ['id' => $emp->id])}}">
                                                        @if($emp->status == '0')
                                                            Bật
                                                        @elseif($emp->status == '1')
                                                            Tắt
                                                        @endif
                                                    </a>
                                                    <a class="btn btn-secondary bg-color"
                                                        href="{{ route('profile.company', ['slug' => $emp->id]) }}">Chi
                                                        tiết</a>
                                                </div>
                                                <img class="avt-user" src="{{ asset($emp->logo) }}" alt="" />
                                                <div class="row">
                                                    <div class="col pt-2 ">
                                                        <p class="row fw-bold p-0 m-0">Tên</p>
                                                        <p class="pt-2  p-0 m-0">{{ $emp->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col pt-2 ">
                                                        <p class="row fw-bold p-0 m-0">Email</p>
                                                        <p class="pt-2 p-0 m-0">{{ $emp->email }}</p>
                                                    </div>
                                                    <div class="col pt-2 ">
                                                        <p class="row fw-bold p-0 m-0">Username</p>
                                                        <p class="pt-2 p-0 m-0">{{ $emp->accounts->first()->username }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col pt-2 ">
                                                        <p class="row fw-bold p-0 m-0">Địa chỉ</p>
                                                        <p class="pt-2  p-0 m-0">{{ $emp->location }}</p>
                                                    </div>
                                                    <div class="col pt-2 ">
                                                        <p class="row fw-bold p-0 m-0">Giờ làm việc </p>
                                                        <p class="pt-2 p-0 m-0">{{ $emp->workingtime }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection
