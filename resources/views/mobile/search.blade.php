@extends('mobile.master')

@section('content')
<div class="padding_bottom">
    <section class="bg-danger p-3">
       <div class="d-flex align-items-center gurdeep-osahan-inner-header mb-3">
          <div class="left mr-auto">
             <a href="home1.html" class="back_button"><i class="btn_detail mdi mdi-chevron-left bg-dark text-white"></i></a>
          </div>
          <div class="center mx-auto"></div>
          <div class="right ml-auto d-flex align-items-center">
             <a class="toggle btn_detail bg-white shadow-sm text-dark" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                   <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
             </a>
          </div>
       </div>
       <div class="search_item input-group p-1 bg-white rounded-3 shadow-sm">
          <span class="input-group-text bg-white mdi mdi-magnify border-0" id="basic-addon1"></span>
          <input type="text" class="form-control border-0 bg-white" placeholder="Search" aria-label="search" aria-describedby="basic-addon1">
       </div>
    </section>
    <section class="search p-3 bg-light body_rounded mt-n5">
       <div class="title mb-3">
          <h6 class="mb-0">Recent Searches</h6>
       </div>
       <a href="detail2.html">
          <p class="text-muted d-flex align-items-center mb-2"><span class="mdi mdi-clock-outline mr-2 h5 mb-0"></span> Burger</p>
       </a>
       <a href="detail2.html">
          <p class="text-muted d-flex align-items-center mb-2"><span class="mdi mdi-clock-outline mr-2 h5 mb-0"></span> Pizza</p>
       </a>
       <a href="detail2.html">
          <p class="text-muted d-flex align-items-center"><span class="mdi mdi-clock-outline mr-2 h5 mb-0"></span> Hard Rock Coffee</p>
       </a>
    </section>
    <section class="search p-3 bg-light">
       <div class="title mb-3">
          <h6 class="mb-0">Recent Searches</h6>
       </div>
       <div class="row">
          <div class="col mb-2 pr-1">
             <a href="detail1.html">
                <div class="featured_item">
                   <div class="position-absolute p-2">
                      <p class="text-white small"><span class="mdi mdi-circle-medium text-warning"></span> Burger</p>
                   </div>
                   <img src="{{asset('mobileTheme/img/search1.jpg')}}" class="img-fluid box_rounded">
                </div>
             </a>
          </div>
          <div class="col mb-2 pl-1">
             <a href="detail1.html">
                <div class="featured_item">
                   <div class="position-absolute p-2">
                      <p class="text-white small"><span class="mdi mdi-circle-medium text-warning"></span> Pizza</p>
                   </div>
                   <img src="{{asset('mobileTheme/img/search2.jpg')}}" class="img-fluid box_rounded">
                </div>
             </a>
          </div>
       </div>
       <div class="row">
          <div class="col mb-2 pr-1">
             <a href="detail1.html">
                <div class="featured_item">
                   <div class="position-absolute p-2">
                      <p class="text-white small"><span class="mdi mdi-circle-medium text-warning"></span> Sandwich</p>
                   </div>
                   <img src="{{asset('mobileTheme/img/search3.jpg')}}" class="img-fluid box_rounded">
                </div>
             </a>
          </div>
          <div class="col mb-2 pl-1">
             <a href="detail1.html">
                <div class="featured_item">
                   <div class="position-absolute p-2">
                      <p class="text-white small"><span class="mdi mdi-circle-medium text-warning"></span> Pasta</p>
                   </div>
                   <img src="{{asset('mobileTheme/img/search4.jpg')}}" class="img-fluid box_rounded">
                </div>
             </a>
          </div>
       </div>
       <div class="row">
          <div class="col mb-2 pr-1">
             <a href="detail1.html">
                <div class="featured_item">
                   <div class="position-absolute p-2">
                      <p class="text-white small"><span class="mdi mdi-circle-medium text-warning"></span> Noodels</p>
                   </div>
                   <img src="{{asset('mobileTheme/img/search5.jpg')}}" class="img-fluid box_rounded">
                </div>
             </a>
          </div>
          <div class="col mb-2 pl-1">
             <a href="detail1.html">
                <div class="featured_item">
                   <div class="position-absolute p-2">
                      <p class="text-white small"><span class="mdi mdi-circle-medium text-warning"></span> Diet Food</p>
                   </div>
                   <img src="{{asset('mobileTheme/img/search6.jpg')}}" class="img-fluid box_rounded">
                </div>
             </a>
          </div>
       </div>
    </section>
 </div>
@include('mobile.horizontal-nav')
@include('mobile.main-nav')
@endsection
