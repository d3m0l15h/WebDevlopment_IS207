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
                @include('layouts/leftbar')
              </div>
              <div class="col-lg-8  box-content">
                  <div class="box">
                      <h3>Employee</h3>
                      <div class="view-content p-4">
                          <form class="input-group flex-nowrap mb-4 " action="/Admin/UserManage" method="get" >
                              <span class="input-group-text" id="addon-wrapping"></span>
                              <input name="name" type="text" class="form-control" placeholder="Username" aria-label="Nhập tên" aria-describedby="addon-wrapping">
                          </form>
                          <div class="w-100 user-container d-flex flex-wrap">

                            @for ($i = 0; $i < count($users); $i++)
                                    <div class="row w-100">
                                      <div class="col a-box rounded-4 p-4 item-user w-50 position-relative" style="border-radius: 12px;">
                                        <div class="position-absolute top-0 end-0 mt-1 me-4">
                                            <a class="btn btn-secondary bg-color" href="/admin/view-user/{{$users[$i]->id}}">Chi tiết</a>
                                      </div>
                                        <img class="avt-user" src="{{ asset('assets/img/blog/blog-author-2.jpg')}}" alt="" />
                                          <div class="col pt-2 ">
                                              <p class="row fw-bold p-0 m-0">{{$users[$i]->name}}</p>
                                              <p class="row  p-0 m-0">{{$users[$i]->email}}</p>
                                            
                                          </div>
                                          <div class="row">
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Kinh nghiệm</p>
                                                  <p class="pt-2  p-0 m-0">{{$users[$i]->experience}}</p>
                                              </div>
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Học vấn: </p>
                                                  <p class="pt-2 p-0 m-0">{{$users[$i]->education}}</p>
                                              </div>

                                          </div>
                                          <div class="row">
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Kỹ năng</p>
                                                  <p class="pt-2  p-0 m-0">{{$users[$i]->skill}}</p>
                                              </div>
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Chứng chỉ</p>
                                                  <p class="pt-2  p-0 m-0">{{$users[$i]->certificate}}</p>
                                              </div>
                                          </div>
                                      </div>
                                      @php
                                          $i++;
                                      @endphp
                                     
                                      <div class="col a-box rounded-4 p-4 item-user w-50 position-relative" style="border-radius: 12px;">
                                          <div class="position-absolute top-0 end-0 mt-1 me-4">
                                              <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <a class="dropdown-item" href="/admin/view-user/{{$users[$i]->id}}">Chi tiết</a>
                                                </button>
                                              </div>
                                          </div>
                                          <img class="avt-user" src="{{ asset('assets/img/blog/blog-author-2.jpg')}}" alt="" />
                                          <div class="col pt-2 ">
                                              <p class="row fw-bold p-0 m-0">{{$users[$i]->name}}</p>
                                              <p class="row  p-0 m-0">{{$users[$i]->email}}</p>

                                          </div>
                                          <div class="row">
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Kinh nghiệm</p>
                                                  <p class="pt-2  p-0 m-0">{{$users[$i]->experience}}</p>
                                              </div>
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Học vấn: </p>
                                                  <p class="pt-2 p-0 m-0">{{$users[$i]->education}}</p>
                                              </div>

                                          </div>
                                          <div class="row">
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Kỹ năng</p>
                                                  <p class="pt-2  p-0 m-0">{{$users[$i]->skill}}</p>
                                              </div>
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Chứng chỉ</p>
                                                  <p class="pt-2  p-0 m-0">{{$users[$i]->certificate}}</p>
                                              </div>
                                          </div>
                                      </div>
                                    
                                  </div>
                            @endfor
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