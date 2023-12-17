@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/employer-information.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/profile-nav.css')}}">
<main id="main blog-details">

  <!-- Blog Details Page Title & Breadcrumbs -->
  <div data-aos="fade" class="page-title">
      <div class="heading">
      </div>
  </div>
  <!-- End Page Title -->
  <!-- Blog-details Section - Blog Details Page -->
  <section id="blog-details" class="blog-details">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5 d-flex gap-2 position-relative">
            <div class="col-lg-3 box-content box-sidebar">
                <div class="sidebar box">
                    <div class="progress-container w-100 d-flex justify-content-center mb-2">
                        <div class="progress-bar">
                            <progress min="0" max="100" value="90" style="visibility:hidden;height:0;width:0;">90%</progress>
                        </div>
                    </div>
                
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
            <form class="col-lg-8 box-content" method="post" enctype="multipart/form-data" action="{{route('profile.employer')}}">
                  @csrf  
              <div class="box" id="introduce-section">
                    <div class="content d-flex flex-row">
                        <div class="avatar-containter position-relative ">
                          <div class="avatar-containter">
                              @if($employer->logo != null && strlen($employer->logo) > 4)
                              <img src="{{asset($employer->logo)}}" alt="" class="w-100 ">
                              @else
                              <img src="{{ asset('assets/img/blog/blog-author-2.jpg')}}" alt="" class="w-100 ">
                              <input type="file" name="avatar" class="avatar">
                              @endif
                          </div>
                        </div>
                       
                        <div class="info-container ms-4 ">
                          <h3>{{$employer->name}}</h3>
                            <p>{{ $email }}</p>
                        </div>
                    </div>
                </div>
                <div class="box"  id="location-section">
                    <div class="content">
                        <h3>
                            Giới thiệu công ty
                        </h3>
                        <div class="form-floating ps-2">
                          <p>{!! $employer->introduce !!}</p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content" id="workingtime-section">
                        <h3>
                            Địa chỉ
                        </h3>
                        <div class="form-floating ps-2">
                            <p>{!! $employer->location !!}</p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content">
                        <h3>
                            Thời gian làm việc
                        </h3>
                        <div class="form-floating ps-2" id="project-section">
                            <p>{!! $employer->workingtime !!}</p>
                        </div>
                    </div>
                </div>
                <div class="box" id="prize-section">
                    <div class="content">
                        <h3>
                            Dự án đã thực hiện
                        </h3>
                        <div class="form-floating ps-2">
                            <p>{!! $employer->ownproject !!}</p>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content">
                        <h3>
                            Giải thưởng
                        </h3>
                        <div class="form-floating ps-2">
                            <p>{!! $employer->prize !!}</p>
                        
                        </div>
                    </div>
                </div>
            </form>
            @if (session('success'))
            <script>
              toastr.success('{{ session('success') }}');
          </script>
              @endif
        </div>
    </div>
</section>

</main>
@endsection