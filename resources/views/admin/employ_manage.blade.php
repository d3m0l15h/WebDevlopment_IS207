@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/admin.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/profile-nav.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/admin-user.css')}}">
<main id="main blog-details">
  <section id="blog-details" class="blog-details">
    <div class="" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5 d-flex position-relative justify-content-center gap-2">
            <div class="col-lg-2 box-content box-sidebar">
              @include('layouts.admin_sidebar')
            </div>
            <div class="col-lg-8  box-content">
                <div class="box">
                    <h3>Employee</h3>
                    <div class="view-content p-4">
                        <form class="input-group flex-nowrap mb-4 " action="/Admin/EmpManage" method="get">
                            <span class="input-group-text" id="addon-wrapping"></span>
                            <input name="name" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                        </form>
                        <div class="w-100 user-container d-flex flex-wrap">
                              @foreach($emps as $emp)
                                <div class="row w-100">
                                    <div class="col a-box rounded-4 p-4 item-user w-50 position-relative" style="border-radius: 12px;">
                                        <div class="position-absolute top-0 end-0 mt-1 me-4">
                                            <a class="btn btn-secondary bg-color" href="/admin/view-employer/{{$emp->id}}">Chi tiết</a>
                                        </div>
                                        <img class="avt-user" src="~/images/@Model.ElementAt(i).Logo" alt="" />
                                        <div class="col pt-2 ">
                                            <p class="row fw-bold p-0 m-0">{{$emp->name}}</p>
                                            <p class="row  p-0 m-0">{{$emp->email}}</p>

                                        </div>
                                        <div class="row">
                                            <div class="col pt-2 ">
                                                <p class="row fw-bold p-0 m-0">Địa chỉ</p>
                                                <p class="pt-2  p-0 m-0">{{$emp->location}}</p>
                                            </div>
                                            <div class="col pt-2 ">
                                                <p class="row fw-bold p-0 m-0">Giờ làm việc </p>
                                                <p class="pt-2 p-0 m-0">{{$emp->working_time}}</p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col pt-2 ">
                                                <p class="row fw-bold p-0 m-0">Chất lượng</p>
                                                <p class="pt-2  p-0 m-0">{{$emp->own_project}}</p>
                                            </div>
                                            <div class="col pt-2 ">
                                                <p class="row fw-bold p-0 m-0">Giải thưởng</p>
                                                <p class="pt-2  p-0 m-0">{{$emp->prize}}</p>
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