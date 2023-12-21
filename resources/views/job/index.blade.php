@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> --}}


    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bộ lọc</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('jobs') }}" method="GET">
                    <div class="modal-body">
                        <h3 class="text-black fw-700">Cấp bậc</h3>
                        <input type="checkbox" class="btn-check" id="btn-check" name="btn-check" autocomplete="off">
                        <label class="btn btn-primary bg-transparent text-black border-1 border-color-primary"
                            for="btn-check">Fresher</label>
                        <input type="checkbox" class="btn-check" id="btn-check-2" name="btn-check-2" autocomplete="off">
                        <label class="btn btn-primary bg-transparent text-black border-1 border-color-primary"
                            for="btn-check-2">Junior</label>
                        <input type="checkbox" class="btn-check" id="btn-check-3" name="btn-check-3" autocomplete="off">
                        <label class="btn btn-primary bg-transparent text-black border-1 border-color-primary"
                            for="btn-check-3">Senior</label>
                        <input type="checkbox" class="btn-check" id="btn-check-4" name="btn-check-4" autocomplete="off">
                        <label class="btn btn-primary bg-transparent text-black border-1 border-color-primary"
                            for="btn-check-4">Manager</label>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-black fw-700">Loại thời gian</h3>
                        <input type="checkbox" class="btn-check" id="btn-check-fulltime" name="btn-check-fulltime" autocomplete="off">
                        <label class="btn btn-primary bg-transparent text-black border-1 border-color-primary"
                            for="btn-check-fulltime">Full-time</label>
                        <input type="checkbox" class="btn-check" id="btn-check-parttime" name="btn-check-parttime" autocomplete="off">
                        <label class="btn btn-primary bg-transparent text-black border-1 border-color-primary "
                            for="btn-check-parttime">Part-time</label>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-black fw-700">Hình thức làm việc</h3>
                        <input type="checkbox" class="btn-check" id="btn-check-remote" name="btn-check-remote" autocomplete="off">
                        <label class="btn btn-primary bg-transparent text-black border-1 border-color-primary"
                            for="btn-check-remote">Từ xa</label>
                        <input type="checkbox" class="btn-check" id="btn-check-office" name="btn-check-office" autocomplete="off">
                        <label class="btn btn-primary bg-transparent text-black border-1 border-color-primary "
                            for="btn-check-office">Tại văn phòng</label>
                        <input type="checkbox" class="btn-check" id="btn-check-flex" name="btn-check-flex" autocomplete="off">
                        <label class="btn btn-primary bg-transparent text-black border-1 border-color-primary "
                            for="btn-check-flex">Linh hoạt</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary bg-color border-0 " data-bs-dismiss="modal">Áp
                            dụng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <main id="main">
        <!-- Blog Page Title & Breadcrumbs -->
        <div data-aos="fade" class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <form>
                            <div class="col-lg-8 w-100 d-flex justify-content-center gap-2   flex-row">
                                <select class="form-select w-auto" aria-label="Default select example" name="location"
                                    value="{{ request('location') }}">
                                    <option selected value="">Địa điểm</option>
                                    <option value="HCM">Hồ Chí Minh</option>
                                    <option value="HN">Hà Nội</option>
                                    <option value="DN">Đà nẵng </option>
                                    <option value="CT">Cần Thơ</option>
                                    <option value="Hue">Huế</option>
                                </select>
                                <input class="w-50 p-3 rounded-2 " type="search" placeholder="Nhập từ khóa"
                                    name="search" value="{{ request('search') }}">
                                <button
                                    class="w-auto p-3 rounded-2 bg-color d-flex justify-content-center align-content-center border-0"
                                    action="submit">
                                    <img src="{{ asset('assets/img/search.png') }}" width="32px" height="32px;"
                                        alt="">
                                    <p class="m-0 fw-bold text-light ">Tìm kiếm</p>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="row mt-2 ">
                        <form action="" method="get">
                            <ul class="row d-flex  flex-row bull list-unstyled justify-content-center ">
                                <li class="w-auto p-2  ">Gợi ý: </li>
                                <li class="list-item w-auto p-2 rounded-2 border-light border-1 ">
                                    <button class="hint-item  rounded-2  bg-transparent text-light" type="submit"
                                        name="search" value="java">Java</button>
                                </li>
                                <li class="list-item w-auto p-2 rounded-2 border-light border-1 ">
                                    <button class="hint-item  rounded-2  bg-transparent text-light" type="submit"
                                        name="search" value="C#">C#</button>
                                </li>
                                <li class="list-item w-auto p-2 rounded-2 border-light border-1 ">
                                    <button class="hint-item  rounded-2  bg-transparent text-light" type="submit"
                                        name="search" value="Golang">Golang</button>
                                </li>
                                <li class="list-item w-auto p-2 rounded-2 border-light border-1 ">
                                    <button class="hint-item  rounded-2  bg-transparent text-light" type="submit"
                                        name="search" value="React">React</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <!-- Blog Section - Blog Page -->
        <section id="blog" class="blog">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <button
                    class="w-auto p-3 rounded-2 bg-color d-flex justify-content-center align-content-center border-0 mb-2"
                    data-bs-toggle="modal" data-bs-target="#filterModal">
                    <p class="m-0 fw-bold text-light "> Lọc</p>
                </button>
                <div class="row gy-4 posts-list">

                    @foreach ($jobs as $job)
                        @if($job->employer->status == '1')
                        <div class="col-xl-6 col-lg-6">
                            <article>
                                <h2 class="title">
                                    <a
                                        href="{{ route('job.detail', ['slug' => Str::slug($job->name) . '-' . $job->id]) }}">{{ $job->name }}</a>
                                </h2>
                                <div class="d-flex  justify-content-start gap-4">
                                    @if ($job->employer->logo != null)
                                        <img src="{{ asset($job->employer->logo) }}" alt=""
                                            class="avt-com rounded-4 ">
                                    @else
                                        <img src="{{ asset('assets/img/blog/blog-author.jpg') }}" alt=""
                                            class="avt-com rounded-4 ">
                                    @endif
                                    <div class="post-meta">
                                        <a
                                            href="{{ route('profile.company', ['slug' => Str::slug($job->employer->name) . '-' . $job->eid]) }}">
                                            <p class="post-author fw-bold ">{{ $job->employer->name }}</p>
                                        </a>
                                        <p class="money-num fw-bold ">
                                            <span><img src="{{ asset('assets/img/circle-money.png') }}" alt=""
                                                    width="20" height="20"></span>
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
                                        <p>
                                            @switch($job->worktype)
                                                @case('remote')
                                                    Từ xa
                                                @break

                                                @case('company')
                                                    Tại văn phòng
                                                @break

                                                @case('hybrid')
                                                    Linh hoạt
                                                @break
                                            @endswitch
                                        </p>
                                        <p>
                                            @switch($job->location)
                                                @case('HCM')
                                                    Hồ Chí Minh
                                                @break

                                                @case('HN')
                                                    Hà Nội
                                                @break

                                                @case('DN')
                                                    Đà Nẵng
                                                @break

                                                @case('CT')
                                                    Cần Thơ
                                                @break

                                                @case('Hue')
                                                    Huế
                                                @break
                                            @endswitch
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endif
                    @endforeach
                    <!-- End post list item -->

                </div><!-- End blog posts list -->

                <div class="pagination d-flex justify-content-center">
                    @if (!empty($jobs) && $jobs->count() && !request('search'))
                        {!! $jobs->appends(Request::all())->links() !!}
                    @endif
                </div><!-- End pagination -->

            </div>

        </section><!-- End Blog Section -->
    </main>

    <!-- ======= Footer ======= -->
@endsection
