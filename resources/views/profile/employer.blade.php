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
  <div class="container profile-nav d-flex flex-row justify-content-start ">
      <a href="{{route('profile')}}" class="fs-5 active">
          Thông tin
      </a>
      <a href="#" class="fs-5">
          Quản lý ứng viên
      </a>
  </div>
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
                  
                      <h6 class="fw-bold mb-2 text-center">Hoàn thiện doanh nghiệp của bạn</h6>
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
                                @if($userProfile->logo != null && strlen($userProfile->logo) > 4)
                                <img src="{{asset($userProfile->logo)}}" alt="" class="w-100 ">
                                <input type="file" name="avatar" class="avatar">
                                @else
                                <img src="{{ asset('assets/img/blog/blog-author-2.jpg')}}" alt="" class="w-100 ">
                                <input type="file" name="avatar" class="avatar">
                                @endif
                            </div>
                          </div>
                         
                          <div class="info-container ms-4 ">
                            <input type="text" name="name" value="{{$userProfile->name}}" required>
                              <p>{{ $email }}</p>
                          </div>
                      </div>
                  </div>
                  <div class="box"  id="location-section">
                      <div class="content">
                          <h3>
                              Giới thiệu công ty
                          </h3>
                          <div class="form-floating">
                            <textarea class="editor" name="introduce" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $userProfile->introduce}}</textarea>
                          </div>
                          @error('introduce')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                      </div>
                  </div>
                  <div class="box">
                      <div class="content" id="workingtime-section">
                          <h3>
                              Địa chỉ
                          </h3>
                          <div class="form-floating">
                              <textarea name="location" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $userProfile->location }}</textarea>
                          </div>
                          @error('location')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                      </div>
                  </div>
                  <div class="box">
                      <div class="content">
                          <h3>
                              Thời gian làm việc
                          </h3>
                          <div class="form-floating" id="project-section">
                              <textarea name="workingTime" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $userProfile->workingtime }}</textarea>
                          </div>
                            @error('workingTime')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                      </div>
                  </div>
                  <div class="box" id="prize-section">
                      <div class="content">
                          <h3>
                              Dự án đã thực hiện
                          </h3>
                          <div class="form-floating">
                              <textarea class="editor" name="ownProject" class="form-control" id="floatingTextarea2" style="height: 100px">{{ $userProfile->ownproject}}</textarea>
                          </div>
                          @error('ownProject')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                      </div>
                  </div>
                  <div class="box">
                      <div class="content">
                          <h3>
                              Giải thưởng
                          </h3>
                          <div class="form-floating">
                              <textarea class="editor" name="prize" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $userProfile->prize}}</textarea>
                          </div>
                          @error('prize')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                      </div>
                  </div>
                  <button type="submit" class="w-100 bg-color border-0 button rounded-2 p-2 text-white mt-4">
                      Cập nhật
                  </button>
              </form>
              @if (session('success'))
              <script>
                toastr.success('{{ session('success') }}');
            </script>
                @endif
          </div>
      </div>
  </section>
  <script>
    var elements = document.getElementsByClassName('editor');
    for (var i = 0; i < elements.length; i++) {
        CKEDITOR.replace(elements[i], {
            toolbar: [{
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    items: ['Scayt']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']
                },
                {
                    name: 'document',
                    items: ['Source']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Subscript',
                        'Superscript'
                    ]
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format']
                },
                {
                    name: 'about',
                    items: ['About']
                }
            ]
        });

        CKEDITOR.instances[elements[i].id].on('change', function() {
            var data = CKEDITOR.instances[elements[i].id].getData();
            document.getElementsByName(elements[i].id)[0].value = data;
        });
    }
</script>
</main>
@endsection