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
             {{-- create a form for search --}}
             <form method="post" action="{{route('search')}}">
                 @csrf
                 <input type="text" class="form-control border-0 bg-white pl-0" name="search" placeholder="Search" aria-label="search" aria-describedby="basic-addon1">
             </form>
          </div>
          <a class="toggle border-0 btn btn-dark rounded-3 homepage-toggle-btn">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
             </svg>
          </a>
       </div>
    </section>
    @if(Session::has('message'))
        {{-- <div class="alert alert-success"> --}}
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{Auth::User()->name}}!</strong> {{ Session::get('message') }}
            </div>
        {{-- </div> --}}
    @endif


    <div class="px-3 p-3">
       <div class="title mb-3 d-flex align-items-center">
          <h6 class="mb-0 fw-bold">Menu</h6>
          <a href="{{url('/')}}/menu/shopping-cart" class="ml-auto"><span class="text-primary">Shopping Cart <i class="mdi mdi-cart text-danger"></i> &nbsp;</span></a>
       </div>


       <section class="bg-light body_rounded position-relative row">
          @foreach ($Menu as $menu)
          <span class="col-4 pr-2" href="detail1#html">
            <div class="bg-white box_rounded overflow-hidden mb-3 shadow-sm">
               <img width="100%" src="{{url('/')}}/uploads/menu/{{$menu->thumbnail}}" class="img-fluid">
               <div class="p-2">
                  <p class="text-dark mb-1 fw-bold">{{$menu->title}}</p>
                  <p class="small mb-2"><i class="mdi mdi-star text-warning"></i> <span class="font-weight-bold text-dark ml-1 fw-bold">4.8</span> <span class="text-muted"> <span class="mdi mdi-circle-medium"></span> African <span class="mdi mdi-circle-medium"></span> kes {{$menu->price}} </span> <span class="bg-light d-inline-block font-weight-bold text-muted rounded-3 py-1 px-2">25-30 min</span></span></p>
                  <p class="small mb-0 text-muted ml-auto">
                    <a class="text-danger add-to-cart" data-url="{{url('/')}}/mobile/shopping-cart/add-to-cart/{{$menu->id}}" href="#">Add to Basket
                        <i class="mdi mdi-cart text-danger"></i> &nbsp;
                        <span style="display: none" class="spinner-border spinner-border-sm" role="status">
                        </span>
                    </a>
                  </p>
               </div>
            </div>
         </span>
          @endforeach
       </section>
       {{-- <div class="text-center">
        <div class="spinner-border spinner-border-sm" role="status">
           <span class="visually-hidden">Loading...</span>
        </div>
     </div> --}}
    </div>
 </div>
 @include('mobile.horizontal-nav')
@include('mobile.main-nav')


@endsection
