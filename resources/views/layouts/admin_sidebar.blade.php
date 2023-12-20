<div class="sidebar box">
    <a href="{{route('admin.dashboard')}}"><h4 class="text-center fw-bold ">DASHBOARD</h4></a>
    <ul class="list-group list-group-flush mt-4 ">
      {{-- <li class="list-group-item">
         <a href="{{route('admin.user')}}" class="tab d-flex flex-row align-items-center ">
            <img src="{{ asset('assets/img/user.png')}}" alt="" width="30" height="30" class="me-4">
            <p>Admin</p>
         </a>
      </li> --}}
       <li class="list-group-item">
          <a href="{{route('admin.user')}}" class="tab d-flex flex-row align-items-center ">
             <img src="{{ asset('assets/img/user.png')}}" alt="" width="30" height="30" class="me-4">
             <p>User</p>
          </a>
       </li>
       <li class="list-group-item d">
          <a href="{{route('admin.employer')}}" class="tab d-flex flex-row align-items-center">
             <img src="{{ asset('assets/img/portfolio.png')}}" alt="" width="30" height="30" class="me-4">
             <p>Employer</p>
          </a>
       </li>
       <li class="list-group-item d">
          <a href="{{route('admin.request')}}" class="tab d-flex flex-row align-items-center">
             <img src="{{ asset('assets/img/portfolio.png')}}" alt="" width="30" height="30" class="me-4">
             <p>Yêu cầu đăng kí NTD</p>
          </a>
       </li>
    </ul>
 </div>
 <!-- End Sidebar -->