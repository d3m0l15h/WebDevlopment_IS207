@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-user.css') }}">

    <main id="main blog-details">
        <section id="blog-details" class="blog-details">
            <div class="" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5 d-flex position-relative justify-content-center gap-2">
                    {{-- <div class="col-lg-2 box-content box-sidebar">
                    @include('layouts.admin_sidebar')
                </div> --}}
                    <div class="col-lg-8  box-content">
                        <div class="box">
                            <h3>Employee</h3>
                            <div class="view-content p-4">
                                <form class="input-group flex-nowrap mb-4 " action="{{ route('employer.manage_applies') }}"
                                    method="get">
                                    <span class="input-group-text" id="addon-wrapping"></span>
                                    <input name="search" type="text" class="form-control"
                                        placeholder="Username or Email" aria-label="Username"
                                        aria-describedby="addon-wrapping">
                                </form>
                                <div class="w-100 user-container d-flex flex-wrap">
                                    {{-- Apply --}}
                                    @foreach ($applies as $apply)
                                        <div class="row w-100">
                                            <div class="col a-box rounded-4 p-4 item-user w-50 position-relative"
                                                style="border-radius: 12px;">
                                                <form class="position-absolute end-0 mt-1 me-4"
                                                    action="{{ route('profile.jobaccept') }}" method="POST">
                                                    @csrf
                                                    <div class="dropdown">
                                                        <select name="status" id="status">
                                                            <option value="2">Chấp Nhận</option>
                                                            <option value="3">Từ Chối</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-secondary bg-color mt-1" type="submit"
                                                        style="width:-webkit-fill-available">Xác nhận</button>
                                                    <input id="jid" name="jid" value="{{ $apply->jid }}"
                                                        style="display: none;" />
                                                    <input id="uid" name="uid" value="{{ $apply->uid }}"
                                                        style="display: none;" />
                                                </form>
                                                <a href="{{ route('job.detail', ['slug' => Str::slug($apply->job->name) . '-' . $apply->job->id]) }}"
                                                    class="fw-bold">{{ $apply->job->name }}</a>
                                                <div class="col pt-2 ">
                                                    <a href="{{route('admin.user_show', ['id'=>$apply->user->id])}}"><p class="row fw-bold p-0 m-0">{{ $apply->user->name }}</p><a>
                                                    <p class="row  p-0 m-0">{{ $apply->user->email }}</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col pt-2 ">
                                                        <p class="row fw-bold p-0 m-0">Điện Thoại</p>
                                                        <p class="pt-2 p-0 m-0">{{ $apply->user->phone }}</p>
                                                    </div>
                                                    <div class="col pt-2 ">
                                                        <p class="row fw-bold p-0 m-0">Trạng Thái</p>
                                                        <p class="pt-2 p-0 m-0">
                                                            <span class="badge bg-warning text-dark">Đang Chờ</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- !Apply --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection
