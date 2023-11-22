@extends('mobile.master-profile')

@section('content')
<div class="d-flex align-items-center gurdeep-osahan-inner-header bg-light p-3">
    <div class="left mr-auto">
       <a href="{{url('/')}}/mobile/shopping-cart" class="back_button"><i class="btn_detail shadow-sm mdi mdi-chevron-left bg-dark text-white shadow-sm"></i></a>
    </div>
    <div class="center mx-auto">
       <p class="mb-0">M-PESA EXPRESS <a href="#" class="text-primary">.<span class="mr-1 mdi mdi-chevron-down"></span></a></p>
    </div>
    <div class="right ml-auto d-flex align-items-center">
       <a class="toggle btn_detail bg-primary shadow-sm text-white" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
             <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
       </a>
    </div>
 </div>
 <div class="padding_bottom">
    <section class="bg-white p-3">
       <a href="{{url('/')}}/mobile/profile" class="text-dark d-flex align-items-center mb-3">
          <div class="mb-3">
             <p class="mb-1 text-danger">Delivered to</p>
             <p class="mb-0 text-dark">{{Auth::User()->location}}</p>
             <p class="small text-muted mb-0">Office 26</p>
          </div>
          <div class="ml-auto"><i class="mdi mdi-chevron-right bg-light p-2 text-muted box_rounded h4 mb-0"></i></div>
       </a>
       <div class="details-page my-1">
          <p class="text-dark h5 mb-3">Shaq's Chomazone</p>
          @foreach ($cartItems as $cartitems)
          <div class="d-flex align-items-center mb-3">
             <div class="mr-2"><img src="{{url('/')}}/uploads/menu/{{ $cartitems->attributes->image }}" class="img-fluid box_rounded cart_img"></div>
             <div class="small text-muted">{{$cartitems->quantity}} x</div>
             <div class="text-dark ml-2">
                <p class="mb-0">{{$cartitems->name}}</p>
                <p class="mb-0 small">KES {{$cartitems->price}}</p>
             </div>
             <a href="{{ url('mobile/shopping-cart') }}/remove/{{$cartitems->id}}" class="ml-auto"><i class="bg-light text-danger p-2 mdi mdi-trash-can-outline box_rounded h6 mb-0"></i></a>
          </div>
          @endforeach
          <p><a href="{{url('/')}}/mobile/search" class="text-primary"><i class="mdi mdi-plus mr-2"></i> Add more items</a></p>
          <a href="{{url('/')}}/mobile/profile" class="d-flex align-items-center mb-3">
             <div class="m-0 h1"><i class="d-block mdi mdi-motorbike box_rounded bg-light text-warning px-3 py-1"></i></div>
             <div class="text-dark ml-3">
                <p class="mb-0">Delivery</p>
                <p class="mb-0 small">KES 100</p>
             </div>
          </a>

       </div>
    </section>
    <section class="bg-white body_rounded mt-n5 position-relative p-4">
        <form action="{{url('/')}}/api/v1/stk/push" method="post" id="initiate-stk">
            @csrf
           <div class="d-flex align-items-center mb-3">
                <span class="mdi mdi-phone box_rounded p-2 btn btn-light mr-3 text-primary"></span>
                <div class="form-floating border-bottom w-100">
                <input type="text" class="form-control border-0 pl-0" name="mobile" id="floatingInputValue" value="{{Auth::User()->mobile}}"  placeholder="+254" required>
                <label for="floatingInputValue" class="pl-0">M-PESA Number</label>
                </div>
           </div>
           <?php $Shipping = 100; $Total = \Cart::getTotal(); ?>
           <input type="hidden" name="amount" value="{{$Total+$Shipping}}">
           <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
           <?php

                $cartCollection = \Cart::getContent();
                $toJson = $cartCollection->toJson();

           ?>
           <input type="hidden" name="cartItems" value="
           @foreach ($cartCollection as $cartCollections) {{$cartCollections->name}}[{{$cartCollections->quantity}}] <br> @endforeach
           ">

           <div class="fixed-bottom p-3">
                <button type="submit" class="btn btn-danger text-left box_rounded w-100 py-3 d-flex align-items-center px-4">Pay Now <span class="ml-auto"></span>KES <?php $Shipping = 100; $Total = \Cart::getTotal(); ?>
                    {{$Total+$Shipping}}</span>
                </button>
           </div>
        </form>
        <div class="text-center">
            <img width="30" src="{{asset('/mobileTheme/img/loading.gif')}}" class="loading-img">
         </div>
     </section>
 </div>








@include('mobile.main-nav')
@endsection
