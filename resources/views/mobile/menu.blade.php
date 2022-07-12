@extends('mobile.master')

@section('content')
@foreach ($Menu as $menu)
<div class="bg-white d-flex align-items-center p-3 gurdeep-osahan-inner-header shadow-sm">
    <div class="left mr-auto">
       <a href="{{url('/')}}/mobile/get-started" class="back_button"><i class="btn_detail mdi mdi-chevron-left bg-dark text-white"></i></a>
    </div>
    <div class="center mx-auto"></div>
    <div class="right ml-auto d-flex align-items-center">
       <a href="{{url('/')}}/mobile/offers" class="fav_button mr-2"><i class="btn_detail mdi mdi-heart bg-danger text-white"></i></a>
       <a class="toggle btn_detail bg-dark text-white" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
             <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
       </a>
    </div>
 </div>
 <div class="padding_bottom">
    <section class="position-relative">
       <div class="osahan-banner">
          <span class="position-absolute title_sign text-white text-center">
             <h1>{{$menu->cat}}</h1>
             <p class="text-white-50 m-0">+<?php echo count(DB::table('product')->where('cat_id',$menu->id)->get()) ?> Options</p>
          </span>
       </div>

       <img width="100%" src="{{url('/')}}/uploads/categories/{{$menu->image}}" class="img-fluid">
    </section>
    <section class="bg-light body_rounded mt-n5 position-relative p-3 row">

        @foreach ($Products as $menu)
        <span class="col-6 pr-2" href="detail1#html">
          <div class="bg-white box_rounded overflow-hidden mb-3 shadow-sm">
             <img width="100%" src="{{url('/')}}/uploads/menu/{{$menu->thumbnail}}" class="img-fluid">
             <div class="p-2">
                <p class="text-dark mb-1 fw-bold">{{$menu->title}}</p>
                <p class="small mb-2"><i class="mdi mdi-star text-warning"></i> <span class="font-weight-bold text-dark ml-1 fw-bold">4.8</span> <span class="text-muted"> <span class="mdi mdi-circle-medium"></span> African <span class="mdi mdi-circle-medium"></span> kes {{$menu->price}} </span> <span class="bg-light d-inline-block font-weight-bold text-muted rounded-3 py-1 px-2">25-30 min</span></span></p>
                <p class="small mb-0 text-muted ml-auto"><a class="text-danger add-to-cart" data-url="{{url('/')}}/mobile/shopping-cart/add-to-cart/{{$menu->id}}" href="#">Add to Basket <i class="mdi mdi-cart text-danger"></i> &nbsp; <span style="display: none" class="spinner-border spinner-border-sm" role="status"></span></a> </p>
             </div>
          </div>
       </span>
        @endforeach

    </section>


 </div>
 @endforeach
 @include('mobile.horizontal-nav')
@include('mobile.main-nav')
@endsection
