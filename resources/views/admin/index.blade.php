@extends('layouts.app')
@section('content')
  <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/profile-nav.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/admin-user.css')}}">
  <main id="main blog-details">
   <section id="blog-details" class="blog-details">
     <div class="" data-aos="fade-up" data-aos-delay="100">
       <div class="row g-5 d-flex position-relative justify-content-center gap-2">  
           <div class="col-lg-2 box-content box-sidebar">
            @include('layouts.admin_sidebar')
         </div>  
         <div class="col-lg-8  box-content">
           <div class="container text-center">
             <div class="row">
               <div class="col a-box rounded-4 p-4">
                 <h3 class="fw-bold main-color">Total User</h3>
                 <p>{{$userCount + $empCount}}</p>
               </div>
               <div class="col a-box rounded-4 p-4 ">
                 <h3 class="fw-bold main-color">Total emloyee</h3>
                 <p>{{$userCount}}</p>
               </div>
             </div>
             <div class="row">
               <div class="col a-box rounded-4 p-4">
                 <h3 class="fw-bold main-color">Total emloyer</h3>
                 <p>{{$empCount}}</p>
               </div>
               <div class="col a-box rounded-4 p-4 ">
                 <h3 class="fw-bold main-color">Total job</h3>
                 <p>{{$jobCount}}</p>
               </div>
             </div>
             <div class="row">
               <div class="col a-box rounded-4 p-4">
                 <h3 class="fw-bold main-color">Total applies</h3>
                 <p>{{$appliedCount}}</p>
               </div>
             </div>
           </div>
         </div>     
       
       </div>

     </div>

   </section><!-- End Blog-details Section -->

 </main>


@endsection