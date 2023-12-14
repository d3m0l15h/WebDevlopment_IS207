@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/create-job.css') }}">
<main id="main">
  <div data-aos="fade" class="page-title">
    <div class="heading ps-4 ">
      <h1 class="text-white ">Chỉnh sửa tin tuyển dụng</h1>
    </div>
  </div>
  <section>
      <div class="container">
          <form action="{{ route('job.store') }}" method="post">
@csrf
          <div class="form-floating mb-4">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="title" value="{{$job->name}}"></textarea>
            <label for="floatingTextarea2">Tiêu đề công việc</label>
                         @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
          </div>
          <div class="form-floating mb-4">
            <h4>Điểm mạnh của công ty</h4>
                        <textarea class="editor" name="strength" id="strength" contenteditable="true" value="{{$job->strength}}"></textarea>
                        @error('strength')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
          </div>
          <div class="form-floating mb-4">
            <h4>Mô tả công việc</h4>
                        <textarea class="editor" id="description" name="description" contenteditable="true" value="{{$job->descriptions}}"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
          </div>
          <div class="form-floating mb-4">
            <h4>Yêu cầu công việc</h4>
                        <textarea class="editor" id="required" name="required" contenteditable="true" value="{{$job->requirements}}"></textarea>
                        @error('required')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
          </div>
          <div class="form-floating mb-4">
            <h4>Tại sao bạn lại làm việc tại đây</h4>
                        <textarea class="editor" id="reason" name="reason" contenteditable="true" value="{{$job->reasons}}"></textarea>
                        @error('reason')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
          </div>
          <div class="mb-3">
            <input type="number" class="form-control" id="luong" name="salary" placeholder="Nhập lương">
          </div>
          <div class="mb-3">
            <input type="number" class="form-control" id="minSalary" name="salarymin" placeholder="Lương tối thiểu" value="{{$job->salarymin}}">
        </div>
        <div class="mb-3">
          <input type="number" class="form-control" id="maxSalary" name="salarymax" placeholder="Lương tối đa" value="{{$job->salarymax}}">
        </div>
          <div class="mb-3">
              <p class="fw-bold">Hình thức làm việc</p>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="WorkType" value="Remote" id="remote">
                <label class="form-check-label" for="remote">
                      Remote
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="WorkType" value="Offline" id="offline" checked>
                <label class="form-check-label" for="offline">
                  Offline
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="WorkType" value="Remote & Offline" id="both" >
                <label class="form-check-label" for="both">
                  Both
                </label>
              </div>
          </div>
          <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="activation" value="active" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Active
                </label>
              </div>
              <div class="form-check mb-4">
                <input class="form-check-input" type="radio" name="activation" value="unactive" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                  Unactive
                </label>
                        </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Đăng tin">
          </div>
        </form>
      </div>
  </section>
<script>
    var elements = document.getElementsByClassName('editor');
    for (var i = 0; i < elements.length; i++) {
    CKEDITOR.replace( elements[i],{
      toolbar: [
        { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'editing', items: [ 'Scayt' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
        { name: 'tools', items: [ 'Maximize' ] },
        { name: 'document', items: [ 'Source' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Subscript', 'Superscript' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
        { name: 'styles', items: [ 'Styles', 'Format' ] },
        { name: 'about', items: [ 'About' ] }
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

    

