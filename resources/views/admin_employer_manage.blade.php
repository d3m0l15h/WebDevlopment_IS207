@include('/layouts/header')
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
                          <form class="input-group flex-nowrap mb-4 " action="/Admin/EmpManage" method="get">
                              <span class="input-group-text" id="addon-wrapping"></span>
                              <input name="name" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                          </form>
                          <div class="w-100 user-container d-flex flex-wrap">
                                @for ($i = 0; $i < count($emps); $i++)
                                  <div class="row w-100">
                                      <div class="col a-box rounded-4 p-4 item-user w-50 position-relative" style="border-radius: 12px;">
                                          <div class="position-absolute top-0 end-0 mt-1 me-4">
                                              <a class="btn btn-secondary bg-color" href="/admin/view-employer/{{$emps[$i]->id}}">Chi tiết</a>
                                          </div>
                                          <img class="avt-user" src="~/images/@Model.ElementAt(i).Logo" alt="" />
                                          <div class="col pt-2 ">
                                              <p class="row fw-bold p-0 m-0">{{$emps[$i]->name}}</p>
                                              <p class="row  p-0 m-0">{{$emps[$i]->email}}</p>
  
                                          </div>
                                          <div class="row">
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Địa chỉ</p>
                                                  <p class="pt-2  p-0 m-0">{{$emps[$i]->location}}</p>
                                              </div>
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Giờ làm việc </p>
                                                  <p class="pt-2 p-0 m-0">{{$emps[$i]->working_time}}</p>
                                              </div>
  
                                          </div>
                                          <div class="row">
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Chất lượng</p>
                                                  <p class="pt-2  p-0 m-0">{{$emps[$i]->own_project}}</p>
                                              </div>
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Giải thưởng</p>
                                                  <p class="pt-2  p-0 m-0">{{$emps[$i]->prize}}</p>
                                              </div>
                                          </div>
                                      </div>
                                      @php
                                        $i++;
                                      @endphp
                                      <div class="col a-box rounded-4 p-4 item-user w-50 position-relative" style="border-radius: 12px;">
                                          <div class="position-absolute top-0 end-0 mt-1 me-4">
                                            <div class="position-absolute top-0 end-0 mt-1 me-4">
                                                <a class="btn btn-secondary bg-color" href="/admin/view-employer/{{$emps[$i]->id}}">Chi tiết</a>
                                            </div>
                                          </div>
                                          <img class="avt-user" src="~/images/@Model.ElementAt(i+1).Logo" alt="" />
                                          <div class="col pt-2 ">
                                              <p class="row fw-bold p-0 m-0">{{$emps[$i]->name}}</p>
                                              <p class="row  p-0 m-0">{{$emps[$i]->email}}</p>
  
                                          </div>
                                          <div class="row">
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Địa chỉ</p>
                                                  <p class="pt-2  p-0 m-0">{{$emps[$i]->location}}</p>
                                              </div>
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Học vấn: </p>
                                                  <p class="pt-2 p-0 m-0">{{$emps[$i]->working_time}}</p>
                                              </div>
  
                                          </div>
                                          <div class="row">
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Chất lướng</p>
                                                  <p class="pt-2  p-0 m-0">{{$emps[$i]->own_project}}</p>
                                              </div>
                                              <div class="col pt-2 ">
                                                  <p class="row fw-bold p-0 m-0">Giải thướng</p>
                                                  <p class="pt-2  p-0 m-0">{{$emps[$i]->prize}}</p>
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
      
  </section>
  </main>
@include('/layouts/footer')
