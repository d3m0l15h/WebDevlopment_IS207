@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/cv.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile-nav.css') }}">
    <main id="main blog-details">

        <!-- Blog Details Page Title & Breadcrumbs -->

        <div data-aos="fade" class="page-title">
            <div class="heading">
            </div>
        </div>
        <section id="blog-details" class="blog-details">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5 d-flex gap-2 position-relative">
                    <div class="col-lg-3 box-content box-sidebar">
                        <div class="sidebar box">
                            <div class="progress-container w-100 d-flex justify-content-center mb-2">
                                <div class="progress-bar">
                                    <progress min="0" max="100" value="90"
                                        style="visibility:hidden;height:0;width:0;">90%</progress>
                                </div>
                            </div>

                            <h6 class="fw-bold mb-2 text-center">Hoàn thiện hồ sơ của bạn</h6>
                            <ul class="list-group list-group-flush mt-4 ">

                                <li class="list-group-item">
                                    <a href="#introduce-section">
                                        + Giới thiệu
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#location-section">
                                        + Địa chỉ
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#workingtime-section">
                                        + Thời gian làm việc
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#project-section">
                                        + Dự án đã thực hiện
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#prize-section">
                                        + Giải thưởng
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Sidebar -->
                    </div>
                    {{-- <form class="" method="POST" action="{{route('profile.uploadavatar')}}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="avatar">Upload Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control-file" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                  </div>
            </form> --}}

                    <form class="col-lg-8 box-content" method="POST" action=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="box" id="introduce-section">
                            <div class="content d-flex flex-row">
                                <div class="avatar-containter">
                                    @if ($user->avatar != null && strlen($user->avatar) > 4)
                                        <img src="{{ asset($user->avatar) }}" alt="" class="w-100 ">
                                    @else
                                        <img src="{{ asset('assets/img/blog/blog-author-2.jpg') }}" alt=""
                                            class="w-100">
                                    @endif
                                </div>
                                <div class="info-container ms-4 ">
                                    <h3>{{ $user->name }} </h3>
                                    <p>{{ $email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="box" id="location-section">
                            <div class="content">
                                <h3>
                                    Giới thiệu bản thân
                                </h3>
                                <div class="form-floating ps-2">
                                    <p>{{ $user->introduce }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="content" id="workingtime-section">
                                <h3>
                                    Học vấn
                                </h3>
                                <div class="form-floating ps-2">
                                    <p>{{ $user->education }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="content">
                                <h3>
                                    Kinh nghiệm
                                </h3>
                                <div class="form-floating ps-2" id="project-section">
                                    <p>{{ $user->experience }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="box" id="prize-section">
                            <div class="content">
                                <h3>
                                    Kĩ năng
                                </h3>
                                <div class="form-floating ps-2">
                                    <p>{{ $user->skill }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="box" id="prize-section">
                            <div class="content">
                                <h3>
                                    Dự án đã thực hiện
                                </h3>
                                <div class="form-floating ps-2">
                                    <p>{{ $user->ownproject }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="box" id="prize-section">
                            <div class="content">
                                <h3>
                                    Chứng chỉ
                                </h3>
                                <div class="form-floating ps-2">
                                    <p>{{ $user->certificate }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="box" id="prize-section">
                            <div class="content">
                                <h3>
                                    Địa Chỉ
                                </h3>
                                <div class="form-floating ps-2">
                                    <p>{{ $user->location }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="content">
                                <h3>
                                    Giải thưởng
                                </h3>
                                <div class="form-floating ps-2">
                                    <p>{{ $user->prize }}</p>

                                </div>
                            </div>
                        </div>
                    </form>
                    @if (session('success'))
                        <script>
                            toastr.success('{{ session('success') }}')
                        </script>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
