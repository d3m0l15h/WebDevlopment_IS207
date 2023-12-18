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
        <div class="container profile-nav d-flex flex-row justify-content-start ">
            <a href="{{ route('profile') }}" class="fs-5 active">
                Thông tin
            </a>
            <a href="{{ route('user.applied') }}" class="fs-5">
                Công việc
            </a>
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

                    <form class="col-lg-8 box-content" method="POST" action="{{ route('profile.user') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="box" id="introduce-section">
                            <div class="content d-flex flex-row">
                                <div class="avatar-containter">
                                    @if ($userProfile->avatar != null && strlen($userProfile->avatar) > 4)
                                        <img src="{{ asset($userProfile->avatar) }}" alt="" class="w-100 ">
                                        <input type="file" name="avatar" class="avatar">
                                    @else
                                        <img src="{{ asset('assets/img/blog/blog-author-2.jpg') }}" alt=""
                                            class="w-100">
                                        <input type="file" name="avatar" class="avatar">
                                    @endif
                                </div>
                                <div class="info-container ms-4 ">
                                    <input type="text" name="name" value="{{ $userProfile->name }}" />
                                    <p>{{ $email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="box" id="location-section">
                            <div class="content">
                                <h3>
                                    Giới thiệu bản thân
                                </h3>
                                <div class="form-floating">
                                    <textarea class="editor" name="introduce" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px">{{ $userProfile->introduce }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="content" id="workingtime-section">
                                <h3>
                                    Học vấn
                                </h3>
                                <div class="form-floating">
                                    <textarea class="editor" name="education" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px">{{ $userProfile->education }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="content">
                                <h3>
                                    Kinh nghiệm
                                </h3>
                                <div class="form-floating" id="project-section">
                                    <textarea class="editor" name="experience" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px">{{ $userProfile->experience }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box" id="prize-section">
                            <div class="content">
                                <h3>
                                    Kĩ năng
                                </h3>
                                <div class="form-floating">
                                    <textarea class="editor" name="skill" class="form-control" id="floatingTextarea2" style="height: 100px">{{ $userProfile->skill }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box" id="prize-section">
                            <div class="content">
                                <h3>
                                    Dự án đã thực hiện
                                </h3>
                                <div class="form-floating">
                                    <textarea class="editor" name="ownProject" class="form-control" id="floatingTextarea2" style="height: 100px">{{ $userProfile->ownproject }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="box" id="prize-section">
                            <div class="content">
                                <h3>
                                    Chứng chỉ
                                </h3>
                                <div class="form-floating">
                                    <textarea class="editor" name="certificate" class="form-control" id="floatingTextarea2" style="height: 100px">{{ $userProfile->certificate }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box" id="prize-section">
                            <div class="content">
                                <h3>
                                    Địa Chỉ
                                </h3>
                                <div class="form-floating">
                                    <textarea name="location" class="form-control" id="floatingTextarea2" style="height: 100px">{{ $userProfile->location }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="content">
                                <h3>
                                    Giải thưởng
                                </h3>
                                <div class="form-floating">
                                    <textarea class="editor" name="prize" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px">{{ $userProfile->prize }}</textarea>

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-100 bg-color border-0 button rounded-2 p-2 text-white mt-4">
                            Cập nhật
                        </button>
                    </form>
                    @if (session('success'))
                        <script>
                            toastr.success('{{ session('success') }}')
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
