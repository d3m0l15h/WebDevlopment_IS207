@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/blog-details.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <main id="main blog-details">
        <div data-aos="fade" class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-start text-center">
                        <div class="col-lg-2 blog-logo">
                            <img class="ratio ratio-1x1 rounded-3" src="{{ asset($job->employer->logo) }}" alt="">
                        </div>
                        <div class="col-lg-6 text-start">
                            <h2 class="mb-0 title"> {{ $job->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->
        <!-- Blog-details Section - Blog Details Page -->
        <section id="blog-details" class="blog-details">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5 d-flex gap-2 position-relative">
                    <div class="col-lg-8 box-content">
                        <div class="box round-2">
                        </div>
                        <!-- Box -->
                        <div class="box">
                            <div class="content">
                                <h3>
                                    3 Lý do để gia nhập công ty
                                </h3>
                                {!! $job->strength !!}
                            </div>
                        </div>
                        <!-- Box -->
                        <div class="box">
                            <div class="content">
                                <h3>
                                    Mô tả công việc
                                </h3>
                                {!! $job->descriptions !!}
                            </div>
                        </div>
                        <!-- Box -->
                        <div class="box">
                            <div class="content">
                                <h3>
                                    Yêu cầu công việc
                                </h3>
                                {!! $job->requirements !!}
                            </div>
                        </div>
                        <!-- Box -->
                        <div class="box">
                            <div class="content">
                                <h3>
                                    Tại sao bạn sẽ yêu thích làm việc tại đây
                                </h3>
                                {!! $job->reasons !!}
                            </div>
                        </div>
                        <!-- Box -->
                    </div>
                    <div class="col-lg-3 box-content box-sidebar">
                        <div class="sidebar box">
                            <div class="sidebar-item categories">
                                <h3 class="sidebar-title mb-1">{{ $job->name }}</h3>
                                <a href="{{ route('profile.company', ['slug' => Str::slug($job->employer->name) . '-' . $job->eid]) }}"
                                    class="ms-0">Xem công ty</a>
                                <div class="salary-wrapper d-flex flex-row justify-content-start gap-2 mt-1">
                                    <img src="{{ asset('assets/img/circle-money.png') }}" width="20" height="20"
                                        alt="">
                                    <p class="money-num fw-bold ">
                                        @if (Auth::check())
                                            @if ($job->salary != 0 || ($job->salarymin == $job->salarymax && $job->salary == 0))
                                                ${{ $job->salary }}
                                            @elseif($job->salarymin != 0 && $job->salarymax != 0 && $job->salary == 0)
                                                ${{ $job->salarymin }} - ${{ $job->salarymax }}
                                            @elseif($job->salarymin == 0 && $job->salarymax == 0 && $job->salary == 0)
                                                Thương lượng
                                            @endif
                                        @else
                                            Đăng nhập để xem mức lương
                                        @endif
                                    </p>
                                </div>
                                <div class="d-flex flex-row justify-content-start gap-2">
                                    <p class="fw-bold">Loại hình làm việc: </p>
                                    <p>{{ $job->worktype }}</p>
                                </div>
                                <div class="d-flex flex-row justify-content-start gap-2">
                                    <p class="fw-bold">Loại thời gian làm việc: </p>
                                    <p>{{ $job->worktime }}</p>
                                </div>
                                <div>
                                    <p><i class="fas fa-clock"></i> {{ $job->createon->diffForHumans() }}</p>
                                </div>
                                {{-- @if (sizeof($applied) == 0) --}}
                                @if (Auth::check() && auth()->user()->role == 'user')
                                    @if ($applied == null)
                                        <button data-bs-toggle="modal" data-bs-target="#send-cv" type="button"
                                            class="w-100 bg-color rounded-2 p-2 text-light fw-2 emp-btn border-0">ỨNG
                                            TUYỂN</button>
                                    @else
                                        <button data-bs-toggle="modal" data-bs-target="#send-cv" disabled type="button"
                                            class="w-100 bg-color rounded-2 p-2 text-light fw-2 emp-btn border-0 ">ĐÃ ỨNG
                                            TUYỂN</button>
                                    @endif
                                @elseif(Auth::check() && auth()->user()->role != 'user')
                                    <button data-bs-toggle="modal" data-bs-target="#send-cv" type="button"
                                        class="w-100 bg-color rounded-2 p-2 text-light fw-2 emp-btn border-0 "
                                        style="background-color: gray" disabled>ỨNG TUYỂN</button>
                                @else
                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
                                        class="w-100 bg-color rounded-2 p-2 text-light fw-2 emp-btn border-0">ỨNG
                                        TUYỂN</button>
                                @endif


                            </div>
                            <div class="sidebar-item tags">
                                <h3 class="sidebar-title">Tags</h3>
                                <ul class="mt-3">
                                    <li><a href="#">App</a></li>
                                    <li><a href="#">IT</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Mac</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">Office</a></li>
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Studio</a></li>
                                    <li><a href="#">Smart</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul>
                            </div>
                            <!-- End sidebar tags-->
                        </div>
                        <!-- End Sidebar -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog-details Section -->
        <div class="modal fade" id="send-cv" tabindex="-1" aria-labelledby="send-cv" aria-hidden="true">
            <div class="modal-dialog" style="max-width:700px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold " id="send-cv">{{ $job->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('profile.uploadcv') }}">
                            @csrf
                            <input id="jid" name="jid" type="text" class="form-control" style="opacity: 0"
                                value="{{ $job->id }}">
                            <div class="mb-3">
                                <label for="cvfile" class="col-form-label fs-5 fw-bold">Tải CV</label>
                                <input id="cvfile" name="cvfile" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label fs-5 fw-bold">Thư xin việc</label>
                                <p>Những kỹ năng, dự án hay thành tựu nào chứng tỏ bạn là một ứng viên tiềm năng cho vị trí
                                    ứng tuyển này?</p>
                                <textarea id="letter" name="letter" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary bg-color">Gửi CV của tôi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
