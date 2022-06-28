@extends('mobile.master-profile')

@section('content')
<div class="padding_bottom">
    <div class="bg-light d-flex align-items-center p-3 gurdeep-osahan-inner-header shadow-sm">
       <div class="left mr-auto">
          <a href="{{url('/')}}/mobile/menu" class="back_button"><i class="btn_detail mdi mdi-chevron-left bg-dark text-white"></i></a>
       </div>
       <div class="center mx-auto"></div>
       <div class="right ml-auto d-flex align-items-center">
          <a href="{{url('/')}}/mobile/menu" class="fav_button mr-2"><i class="btn_detail mdi mdi-heart bg-danger text-white"></i></a>
          <a class="toggle btn_detail bg-white shadow-sm text-dark" href="#">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
             </svg>
          </a>
       </div>
    </div>

    <section class="bg-white body_rounded mt-n5 py-3 pl-3">

       <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
             <div class="title mb-3">
                <h6 class="mb-0">Whole Pizza Pies</h6>
             </div>
             <div class="featured_slider mb-4">
                <a href="#">
                   <div class="featured_item mr-2">
                      <span class="position-absolute pb-2 pl-3">
                         <p class="text-white mb-1">Peperoni Pie</p>
                         <span class="text-muted">kes 23</span>
                      </span>
                      <img src="{{asset('mobileTheme/img/food1.jpg')}}" class="img-fluid box_rounded">
                   </div>
                </a>

             </div>
             <div class="title mb-0">
                <h5 class="mb-0">Whole Pizza Pies</h5>
             </div>
             <p class="text-primary mb-2 fw-bold">Lunch</p>
             <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          </div>
       </div>
    </section>
 </div>
 <footer class="bg-danger body_rounded fixed-bottom">
    <a href="{{url('/')}}/mobile/shopping-cart/" class="d-flex p-3 align-items-center text-white">
    <span class="py-2 px-3 box_rounded bg-white text-danger">2</span>
    <span class="ml-3 d-flex align-items-center h5 mb-0">My cart <i class="mdi mdi-chevron-down h5 mb-0"></i></span>
    <span class="ml-3 d-flex align-items-center ml-auto h5 mb-0 fw-bold">kes 63,00</span>
    </a>
 </footer>

 @include('mobile.main-nav')
@endsection
