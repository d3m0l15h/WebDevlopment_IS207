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
                <form action="{{ route('job.update', ['id' => $job->id]) }}" method="post">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" name="title" value="{{ $job->name }}">
                        <label for="floatingTextarea2">Tiêu đề công việc</label>
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <h4>Điểm mạnh của công ty</h4>
                        <textarea class="editor2" name="strength" id="strength" contenteditable="true">{{ $job->strength }}</textarea>
                        @error('strength')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <h4>Mô tả công việc</h4>
                        <textarea class="editor2" id="description" name="description" contenteditable="true">{{ $job->descriptions }}</textarea>
                        @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <h4>Yêu cầu công việc</h4>
                        <textarea class="editor2" id="required" name="required" contenteditable="true">{{ $job->requirements }}</textarea>
                        @error('required')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <h4>Tại sao bạn lại làm việc tại đây</h4>
                        <textarea class="editor2" id="reason" name="reason" contenteditable="true">{{ $job->reasons }}</textarea>
                        @error('reason')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-control" id="floatingSelect" name="location">
                            <option selected>Chọn địa điểm</option>
                            <option value="HCM" {{ $job->location == 'HCM' ? 'selected' : '' }}>Hồ Chí Minh</option>
                            <option value="HN" {{ $job->location == 'HN' ? 'selected' : '' }}>Hà Nội</option>
                            <option value="DN" {{ $job->location == 'DN' ? 'selected' : '' }}>Đà nẵng</option>
                            <option value="CT" {{ $job->location == 'CT' ? 'selected' : '' }}>Cần Thơ</option>
                            <option value="Hue" {{ $job->location == 'Hue' ? 'selected' : '' }}>Huế</option>
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
                            <option value="fresher" {{ $job->level == 'fresher' ? 'selected' : '' }}>Fresher</option>
                            <option value="junior" {{ $job->level == 'junior' ? 'selected' : '' }}>Junior</option>
                            <option value="senior" {{ $job->level == 'senior' ? 'selected' : '' }}>Senior</option>
                            <option value="manager" {{ $job->level == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="clevel" {{ $job->level == 'clevel' ? 'selected' : '' }}>C-level</option>
                        </select>
                        <label for="floatingSelect1">Cấp bậc ứng viên</label>
                        @error('level')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="luong" name="salary" placeholder="Nhập lương"
                            value={{ $job->salary }} required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="minSalary" name="salarymin"
                            placeholder="Lương tối thiểu" value={{ $job->salarymin }} required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="maxSalary" name="salarymax"
                            placeholder="Lương tối đa" value={{ $job->salarymax }} required>
                    </div>
                    @error('salarymax')
                        <div class="alert alert-danger mt-2">Lương tối đa phải lớn hơn lương tối thiểu</div>
                    @enderror
                    <div class="mb-3">
                        <p class="fw-bold">Hình thức làm việc</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="worktype" value="remote" id="remote"
                                {{ $job->worktype == 'remote' ? 'checked' : '' }}>
                            <label class="form-check-label" for="remote">
                                Remote
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="worktype" value="company" id="company"
                                {{ $job->worktype == 'company' ? 'checked' : '' }}>
                            <label class="form-check-label" for="company">
                                Company
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="worktype" value="hybrid"
                                id="hybrid" {{ $job->worktype == 'hybrid' ? 'checked' : '' }}>
                            <label class="form-check-label" for="hybrid">
                                Hybrid
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="worktime" value="Full-time"
                                id="flexRadioDefault3" {{ $job->worktime == 'Full-time' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault3">
                                Full-time
                            </label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="worktime" value="Part-time"
                                id="flexRadioDefault4" {{ $job->worktime == 'Part-time' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault4">
                                Part-time
                            </label>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Cập nhật">
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
            var elements = document.getElementsByClassName('editor2');
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
