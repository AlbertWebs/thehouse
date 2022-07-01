@extends('mobile.master-home')

@section('content')
<div class="padding_bottom">
    <section class="bg-warning p-3">
       <div class="location_search">
          <p class="text-dark mb-1 fw-bold">Welcome Back {{Auth::User()->name}}</p>
          <p class="text-dark mb-1 fw-bold">DELIVERING TO</p>
          <p> {{Auth::User()->location}} <span class="mr-1 mdi mdi-chevron-down text-dark"></span></p>
       </div>
       <div class="d-flex align-items-center">
          <div class="search_item shadow-sm p-1 input-group bg-white rounded-3 mr-3">
             <span class="input-group-text bg-white mdi mdi-magnify border-0" id="basic-addon1"></span>
             <input type="text" class="form-control border-0 bg-white pl-0" placeholder="Search" aria-label="search" aria-describedby="basic-addon1">
          </div>
          <a class="toggle border-0 btn btn-dark rounded-3 homepage-toggle-btn">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
             </svg>
          </a>
       </div>
    </section>
    <section class="featured py-3 pl-3 bg-white body_rounded mt-n5">
       <div class="title mb-3">
          <h6 class="mb-0 fw-bold">Featured</h6>
       </div>
       <div class="featured_slider">
          <a href="new_arrivals#html">
             <div class="featured_item mr-2">
                <span class="position-absolute pb-2 pl-3">
                   <p class="text-white mb-1">Peperoni Pie</p>
                   <span class="text-muted">$23</span>
                </span>
                <img src="{{asset('mobileTheme/img/food1.jpg')}}" class="img-fluid box_rounded">
             </div>
          </a>
          <a href="new_arrivals#html">
             <div class="featured_item mr-2">
                <span class="position-absolute pb-2 pl-3">
                   <p class="text-white mb-1">Veg Loaded pizza</p>
                   <span class="text-muted">$33</span>
                </span>
                <img src="{{asset('mobileTheme/img/food2.jpg')}}" class="img-fluid box_rounded">
             </div>
          </a>
          <a href="new_arrivals#html">
             <div class="featured_item mr-2">
                <span class="position-absolute pb-2 pl-3">
                   <p class="text-white mb-1">White Sauce Pasta</p>
                   <span class="text-muted">$43</span>
                </span>
                <img src="{{asset('mobileTheme/img/food3.jpg')}}" class="img-fluid box_rounded">
             </div>
          </a>
       </div>
    </section>
    <section class="near py-3 pl-3 bg-light">
       <div class="title mb-2 pb-1 d-flex align-items-center">
          <h6 class="mb-0 fw-bold">Near you</h6>
          <a href="near#html" class="ml-auto pr-3"><span class="text-primary">View All</span></a>
       </div>
       <div class="near_slider">
          <a href="detail2#html">
             <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm">
                <img src="{{asset('mobileTheme/img/3.png')}}" class="img-fluid mx-auto mb-2 rounded-pill">
                <p class="mb-2 text-dark">Cake & Shakea</p>
                <span class="bg-light px-2 py-1 text-dark text-muted rounded-3">40 min</span>
             </div>
          </a>
          <a href="detail2#html">
             <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm">
                <img src="{{asset('mobileTheme/img/1.png')}}" class="img-fluid mx-auto mb-2 rounded-pill">
                <p class="mb-2 text-dark">Oberoia Special</p>
                <span class="bg-light px-2 py-1 text-dark text-muted rounded-3">30 min</span>
             </div>
          </a>
          <a href="detail2#html">
             <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm">
                <img src="{{asset('mobileTheme/img/5.png')}}" class="img-fluid mx-auto mb-2 rounded-pill">
                <p class="mb-2 text-dark">Pizzaa Places</p>
                <span class="bg-light px-2 py-1 text-dark text-muted rounded-3">20 min</span>
             </div>
          </a>
          <a href="detail2#html">
             <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm">
                <img src="{{asset('mobileTheme/img/2.png')}}" class="img-fluid mx-auto mb-2 rounded-pill">
                <p class="mb-2 text-dark">Eat Well Dhabas</p>
                <span class="bg-light px-2 py-1 text-dark text-muted rounded-3">45 min</span>
             </div>
          </a>
       </div>
    </section>
    <div class="px-3">
       <div class="title mb-3 d-flex align-items-center">
          <h6 class="mb-0 fw-bold">Offer Food</h6>
          <a href="near#html" class="ml-auto"><span class="text-primary">View All</span></a>
       </div>
       <section class="bg-light body_rounded position-relative row">
          <a class="col-6 pr-2" href="detail1#html">
             <div class="bg-white box_rounded overflow-hidden mb-3 shadow-sm">
                <img src="{{asset('mobileTheme/img/search1.jpg')}}" class="img-fluid">
                <div class="p-2">
                   <p class="text-dark mb-1 fw-bold">Na Thai Town</p>
                   <p class="small mb-2"><i class="mdi mdi-star text-warning"></i> <span class="font-weight-bold text-dark ml-1 fw-bold">4.8</span> <span class="text-muted"> <span class="mdi mdi-circle-medium"></span> African <span class="mdi mdi-circle-medium"></span> kes $29 </span></p>
                   <p class="small mb-0 text-muted ml-auto"><span class="bg-light d-inline-block font-weight-bold text-muted rounded-3 py-1 px-2">25-30 min</span></p>
                </div>
             </div>
          </a>
          <a class="col-6 pl-2" href="detail1#html">
             <div class="bg-white box_rounded overflow-hidden mb-3 shadow-sm">
                <img src="{{asset('mobileTheme/img/search2.jpg')}}" class="img-fluid">
                <div class="p-2">
                   <p class="text-dark mb-1 fw-bold">Thai Casual</p>
                   <p class="small mb-2"><i class="mdi mdi-star text-warning"></i> <span class="font-weight-bold text-dark ml-1 fw-bold">4.8</span> <span class="text-muted"> <span class="mdi mdi-circle-medium"></span> African <span class="mdi mdi-circle-medium"></span> kes $29 </span></p>
                   <p class="small mb-0 text-muted ml-auto"><span class="bg-light d-inline-block font-weight-bold text-muted rounded-3 py-1 px-2">25-30 min</span></p>
                </div>
             </div>
          </a>
          <a class="col-6 pr-2" href="detail1#html">
             <div class="bg-white box_rounded overflow-hidden mb-3 shadow-sm">
                <img src="{{asset('mobileTheme/img/search3.jpg')}}" class="img-fluid">
                <div class="p-2">
                   <p class="text-dark mb-1 fw-bold">Italic Food</p>
                   <p class="small mb-2"><i class="mdi mdi-star text-warning"></i> <span class="font-weight-bold text-dark ml-1 fw-bold">4.8</span> <span class="text-muted"> <span class="mdi mdi-circle-medium"></span> African <span class="mdi mdi-circle-medium"></span> kes $29 </span></p>
                   <p class="small mb-0 text-muted ml-auto"><span class="bg-light d-inline-block font-weight-bold text-muted rounded-3 py-1 px-2">25-30 min</span></p>
                </div>
             </div>
          </a>
          <a class="col-6 pl-2" href="detail1#html">
             <div class="bg-white box_rounded overflow-hidden mb-3 shadow-sm">
                <img src="{{asset('mobileTheme/img/search4.jpg')}}" class="img-fluid">
                <div class="p-2">
                   <p class="text-dark mb-1 fw-bold">The Mint Sauce</p>
                   <p class="small mb-2"><i class="mdi mdi-star text-warning"></i> <span class="font-weight-bold text-dark ml-1 fw-bold">4.8</span> <span class="text-muted"> <span class="mdi mdi-circle-medium"></span> African <span class="mdi mdi-circle-medium"></span> kes $29 </span></p>
                   <p class="small mb-0 text-muted ml-auto"><span class="bg-light d-inline-block font-weight-bold text-muted rounded-3 py-1 px-2">25-30 min</span></p>
                </div>
             </div>
          </a>
          <a class="col-6 pr-2" href="detail1#html">
             <div class="bg-white box_rounded overflow-hidden mb-3 shadow-sm">
                <img src="{{asset('mobileTheme/img/search5.jpg')}}" class="img-fluid">
                <div class="p-2">
                   <p class="text-dark mb-1 fw-bold">Mid - Day Town</p>
                   <p class="small mb-2"><i class="mdi mdi-star text-warning"></i> <span class="font-weight-bold text-dark ml-1 fw-bold">4.8</span> <span class="text-muted"> <span class="mdi mdi-circle-medium"></span> African <span class="mdi mdi-circle-medium"></span> kes $29 </span></p>
                   <p class="small mb-0 text-muted ml-auto"><span class="bg-light d-inline-block font-weight-bold text-muted rounded-3 py-1 px-2">25-30 min</span></p>
                </div>
             </div>
          </a>
          <a class="col-6 pl-2" href="detail1#html">
             <div class="bg-white box_rounded overflow-hidden mb-3 shadow-sm">
                <img src="{{asset('mobileTheme/img/search6.jpg')}}" class="img-fluid">
                <div class="p-2">
                   <p class="text-dark mb-1 fw-bold">Diet Town</p>
                   <p class="small mb-2"><i class="mdi mdi-star text-warning"></i> <span class="font-weight-bold text-dark ml-1 fw-bold">4.8</span> <span class="text-muted"> <span class="mdi mdi-circle-medium"></span> African <span class="mdi mdi-circle-medium"></span> kes $29 </span></p>
                   <p class="small mb-0 text-muted ml-auto"><span class="bg-light d-inline-block font-weight-bold text-muted rounded-3 py-1 px-2">25-30 min</span></p>
                </div>
             </div>
          </a>
       </section>
       <div class="text-center">
        <div class="spinner-border spinner-border-sm" role="status">
           <span class="visually-hidden">Loading...</span>
        </div>
     </div>
    </div>
 </div>
 @include('mobile.horizontal-nav')
@include('mobile.main-nav')
@endsection
