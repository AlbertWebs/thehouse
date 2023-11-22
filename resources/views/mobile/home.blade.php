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
    <section class="featured py-3 pl-3 bg-white body_rounded mt-n5">
       <div class="title mb-3">
          <h6 class="mb-0 fw-bold">Featured</h6>
       </div>
       <div class="featured_slider">
          @foreach ($category as $cat)
          <a href="{{url('/')}}/mobile/menu/{{$cat->slung}}">
            <div class="featured_item mr-2">
               <span class="position-absolute pb-2 pl-3">
                  <p class="text-white mb-1">{{$cat->cat}}</p>
                  <span class="text-muted"></span>
               </span>
               <img src="{{url('/')}}/uploads/categories/{{$cat->thumbnail}}" class="img-fluid box_rounded">
            </div>
         </a>
          @endforeach
       </div>
    </section>
    @if($Orders->isEmpty())

    @else
    <section class="near py-3 pl-3 bg-light">
       <div class="title mb-2 pb-1 d-flex align-items-center">
          <h6 class="mb-0 fw-bold">Your Picks</h6>
          <a href="{{url('/')}}/mobile/profile/orders" class="ml-auto pr-3"><span class="text-primary">View All</span></a>
       </div>
       <div class="near_slider">
          @foreach($Orders as $order)
          <?php
             $MenuOrders = DB::table('menu_orders')->where('orders_id',$order->id)->distinct('menu_id')->get();
          ?>
            @foreach ($MenuOrders as $menus)
                <?php
                    $Menus = App\Models\Menu::where('id',$menus->menu_id)->limit(10)->get();
                ?>
                @foreach ($Menus as $menu)
                    <a href="detail2#html">
                        <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm">
                        <img style="max-width:60px" src="{{url('/')}}/uploads/menu/{{$menu->thumbnail}}" class="img-fluid mx-auto mb-2 rounded-pill">
                        <p class="mb-2 text-dark">{{$menu->title}}</p>
                        <span class="bg-light px-2 py-1 text-dark text-muted rounded-3">40 min</span>
                        </div>
                    </a>
                @endforeach
            @endforeach
          @endforeach
       </div>
    </section>
    @endif
    <div class="px-3">
       <div class="title mb-3 d-flex align-items-center">
          <h6 class="mb-0 fw-bold">Menu</h6>
          <a href="{{route('food')}}" class="ml-auto"><span class="text-primary">View All</span></a>
       </div>

       <div style="display: none" id="display-none" class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Holy guacamole!</strong> Your shopping Basket has been updated!
       </div>

       <section class="bg-light body_rounded position-relative row">
          @foreach ($Menu as $menu)
          <span class="col-6 pr-2" href="detail1#html">
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
