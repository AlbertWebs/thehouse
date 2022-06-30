@extends('mobile.master-location')

@section('content')
<div class="d-flex align-items-center bg-light gurdeep-osahan-inner-header p-3">
    <div class="left mr-2">
       <a href="orders1.html" class="back_button"><i class="btn_detail shadow-sm mdi mdi-chevron-left bg-dark text-white shadow-sm"></i></a>
    </div>
    <div class="center mr-auto">
       <h6 class="text-dark mb-0">My Orders</h6>
    </div>
    <div class="right ml-auto d-flex align-items-center">
       <a href="search1.html" class="ml-auto mr-2"><i class="btn_detail mdi mdi-magnify bg-danger text-white"></i></a>
       <a class="toggle btn_detail bg-dark shadow-sm text-white" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
             <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
       </a>
    </div>
 </div>
 <section class="p-3">
    <p class="small text-muted mb-0 mb-2">29 AUG 2022</p>
    <div class="order_detail order_detail-2 mb-2 bg-light p-3 box_rounded">
       <a href="detail1.html" class="d-flex align-items-center pb-3">
          <div class="bg-white box_rounded">
             <img src="{{asset('mobileTheme/img/1.png')}}" class="img-fluid rounded">
          </div>
          <div class="ml-3 d-flex w-100">
             <div class="text-dark">
                <p class="mb-1 fw-bold">Oberoia Special</p>
                <p class="small text-muted mb-0">July 06, 2022 <span class="ml-1"><i class="mdi mdi-circle-medium mr-1"></i>23:54</span></p>
             </div>
             <div class="badge bg-success ml-auto mb-auto">Completed</div>
          </div>
       </a>
       <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-primary btn-block mr-1 box_rounded w-50 btn-sm py-2">Reorder</a>
          <a href="#" class="btn btn-outline-primary btn-block ml-1 box_rounded w-50 btn-sm py-2">Get Help</a>
       </div>
    </div>
    <div class="order_detail order_detail-2 mb-2 bg-light p-3 box_rounded">
       <a href="detail1.html" class="d-flex align-items-center pb-3">
          <div class="bg-white box_rounded">
             <img src="{{asset('mobileTheme/img/2.png')}}" class="img-fluid rounded">
          </div>
          <div class="ml-3 d-flex w-100">
             <div class="text-dark">
                <p class="mb-1 fw-bold">Eat Well Dhabas</p>
                <p class="small text-muted mb-0">July 06, 2022 <span class="ml-1"><i class="mdi mdi-circle-medium mr-1"></i>23:54</span></p>
             </div>
             <div class="badge bg-success ml-auto mb-auto">Completed</div>
          </div>
       </a>
       <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-primary btn-block mr-1 box_rounded w-50 btn-sm py-2">Reorder</a>
          <a href="#" class="btn btn-outline-primary btn-block ml-1 box_rounded w-50 btn-sm py-2">Get Help</a>
       </div>
    </div>
    <div class="order_detail order_detail-2 mb-2 bg-light p-3 box_rounded">
       <a href="detail1.html" class="d-flex align-items-center pb-3">
          <div class="bg-white box_rounded">
             <img src="{{asset('mobileTheme/img/5.png')}}" class="img-fluid rounded">
          </div>
          <div class="ml-3 d-flex w-100">
             <div class="text-dark">
                <p class="mb-1 fw-bold">Pizzaa Places</p>
                <p class="small text-muted mb-0">July 06, 2022 <span class="ml-1"><i class="mdi mdi-circle-medium mr-1"></i>23:54</span></p>
             </div>
             <div class="badge bg-success ml-auto mb-auto">Completed</div>
          </div>
       </a>
       <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-primary btn-block mr-1 box_rounded w-50 btn-sm py-2">Reorder</a>
          <a href="#" class="btn btn-outline-primary btn-block ml-1 box_rounded w-50 btn-sm py-2">Get Help</a>
       </div>
    </div>
    <p class="small text-muted mb-0 mb-2 mt-5">28 AUG 2022</p>
    <div class="order_detail order_detail-2 mb-2 bg-light p-3 box_rounded">
       <a href="detail1.html" class="d-flex align-items-center pb-3">
          <div class="bg-white box_rounded">
             <img src="{{asset('mobileTheme/img/1.png')}}" class="img-fluid rounded">
          </div>
          <div class="ml-3 d-flex w-100">
             <div class="text-dark">
                <p class="mb-1 fw-bold">Oberoia Special</p>
                <p class="small text-muted mb-0">July 06, 2022 <span class="ml-1"><i class="mdi mdi-circle-medium mr-1"></i>23:54</span></p>
             </div>
             <div class="badge bg-success ml-auto mb-auto">Completed</div>
          </div>
       </a>
       <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-primary btn-block mr-1 box_rounded w-50 btn-sm py-2">Reorder</a>
          <a href="#" class="btn btn-outline-primary btn-block ml-1 box_rounded w-50 btn-sm py-2">Get Help</a>
       </div>
    </div>
 </section>
@include('mobile.main-nav')
@endsection
