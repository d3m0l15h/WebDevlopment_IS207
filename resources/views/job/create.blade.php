@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/create-job.css') }}">
    <main id="main">
        <div data-aos="fade" class="page-title">
            <div class="heading ps-4 ">
                <h1 class="text-white ">Đăng tin tuyển dụng</h1>
            </div>
        </div>
        <section>
            <div class="container">
                <form action="{{ route('job.store') }}" method="post">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" name="title" value="{{ old('title') }}">
                        <label for="floatingTextarea2">Tiêu đề công việc</label>
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <h4>Điểm mạnh của công ty</h4>
                        <textarea class="editor" name="strength" id="strength" contenteditable="true">{{ old('strength') }}</textarea>
                        @error('strength')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <h4>Mô tả công việc</h4>
                        <textarea class="editor" id="description" name="description" contenteditable="true">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <h4>Yêu cầu công việc</h4>
                        <textarea class="editor" id="required" name="required" contenteditable="true" >{{ old('required') }}</textarea>
                        @error('required')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <h4>Tại sao bạn lại làm việc tại đây</h4>
                        <textarea class="editor" id="reason" name="reason" contenteditable="true">{{ old('reason') }}</textarea>
                        @error('reason')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-control" id="floatingSelect" name="location">
                          <option selected>Chọn địa điểm</option>
                          <option value="HCM" {{ old('location') == 'HCM' ? 'selected' : '' }}>Hồ Chí Minh</option>
                          <option value="HN" {{ old('location') == 'HN' ? 'selected' : '' }}>Hà Nội</option>
                          <option value="DN" {{ old('location') == 'DN' ? 'selected' : '' }}>Đà nẵng </option>
                          <option value="CT" {{ old('location') == 'CT' ? 'selected' : '' }}>Cần Thơ</option>
                          <option value="Hue" {{ old('location') == 'Hue' ? 'selected' : '' }}>Huế</option>
                            <!-- Add more options as needed -->
                        </select>
                        <label for="floatingSelect">Địa điểm</label>
                        @error('location')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-control" id="floatingSelect1" name="level">
                          <option selected>Chọn cấp bậc</option>
                          <option value="fresher" {{ old('level') == 'fresher' ? 'selected' : '' }}>Fresher</option>
                          <option value="junior" {{ old('level') == 'junior' ? 'selected' : '' }}>Junior</option>
                          <option value="senior" {{ old('level') == 'senior' ? 'selected' : '' }}>Senior</option>
                          <option value="manager" {{ old('level') == 'manager' ? 'selected' : '' }}>Manager</option>
                          <option value="clevel" {{ old('level') == 'clevel' ? 'selected' : '' }}>C-level</option>
                            <!-- Add more options as needed -->
                        </select>
                        <label for="floatingSelect1">Cấp bậc ứng viên</label>
                        @error('level')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="luong" name="salary" placeholder="Nhập lương" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="minSalary" name="salarymin"
                            placeholder="Lương tối thiểu" value=0 required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="maxSalary" name="salarymax"
                            placeholder="Lương tối đa" value="0" required>
                    </div>
                    @error('salarymax')
                        <div class="alert alert-danger mt-2">Lương tối đa phải lớn hơn lương tối thiểu</div>
                    @enderror
                    <div class="mb-3">
                        <p class="fw-bold">Hình thức làm việc</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="worktype" value="remote" id="remote">
                            <label class="form-check-label" for="remote">
                                Remote
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="worktype" value="company" id="company"
                                checked>
                            <label class="form-check-label" for="company">
                                Company
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="worktype" value="hybrid"
                                id="hybrid">
                            <label class="form-check-label" for="hybrid">
                                Hybrid
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="worktime" value="Full-time"
                                id="flexRadioDefault3" checked>
                            <label class="form-check-label" for="flexRadioDefault3">
                                Full-time
                            </label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="worktime" value="Part-time"
                                id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">
                                Part-time
                            </label>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Đăng tin">
                    </div>
                </form>
                @if (Session::has('success'))
                        <script>
                            toastr.success("{{ Session::get('success') }}");
                        </script>
                @elseif (Session::has('error'))
                        <script>
                            toastr.error("{{ Session::get('error') }}");
                        </script>
                @endif
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
