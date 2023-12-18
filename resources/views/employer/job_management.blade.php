@extends('layouts.app')
@section('content')
  <link rel="stylesheet" href="{{ asset('assets/css/employ-management.css') }}">
  <main id="main blog-details">

    <!-- Blog Details Page Title & Breadcrumbs -->
    <div data-aos="fade" class="page-title">
      <div class="heading">

      </div>
    </div><!-- End Page Title -->

    <!-- Blog-details Section - Blog Details Page -->
    <section id="blog-details" class="blog-details">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5 d-flex gap-2 position-relative">  
        <div class="col-lg-3 box-content box-sidebar">

            <div class="sidebar box">
                <h3>Tìm kiếm</h3>
                <form action="{{ route('employer.manage_jobs')}}" method="GET">
                <ul class="list-group list-group-flush mt-4 ">
                  <input type="text" name="search" id="search">
                  </ul>
                  <button type="submit" class="w-100 bg-color border-0 button rounded-2 p-2 text-white mt-4" >
                    Tìm
                  </button>
                </form>
            </div><!-- End Sidebar -->
          </div>  
          <div class="col-lg-8 box-content">

            @foreach($jobs as $job)
            <div class="box">
              <div class="content d-flex flex-row">
                <div class="avatar-containter">
                    <img src="{{ asset('assets/img/blog/blog-author-2.jpg')}}" alt="" class="w-100 ">
                </div>
                <div class="info-container ms-4 ">
                    <h3>{{$job->name}}</h3>
                    <div class="salary-wrapper d-flex flex-row justify-content-start gap-2">
                      <img src="{{ asset('assets/img/circle-money.png') }}" width="20" height="20" alt="">
                      <p class="money-num fw-bold ">${{$job->salarymin}} - ${{$job->salarymax}}</p>
                    </div>
                    <p class="main-color fw-bold ">Số lượng đã ứng tuyển: 223</p>
                </div>
                <!-- Edit Button -->
                <div class="edit-container h-100 flex-grow-1 ">
                    <ul>
                        <li>
                            <button type="button" class="edit-btn rounded-2  m-2" onclick="location.href='{{ route('job.update', ['id' => $job->id]) }}'"><p>Edit</p></button>
                        </li>
                        <li>
                            <button type="button" class="unac-btn rounded-2  m-2" onclick="location.href='{{ route('employer.manage_status_toggle', ['id' => $job->id]) }}'">
                              @if($job->status == '0')
                                Active
                              @else
                                Unactive
                              @endif
                            </button>
                        </li>
                        {{-- <li>
                            <button type="button" class="del-btn rounded-2  m-2">Delete</button>
                        </li> --}}
                    </ul>
                </div>
                <!-- !Edit Button -->
              </div>
            </div>
            @endforeach

          </div>  
        </div>

      </div>

    </section><!-- End Blog-details Section -->

  </main>
@endsection