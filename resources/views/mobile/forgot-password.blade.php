@extends('mobile.master-sign')

@section('content')
<div class="d-flex align-items-center p-3 gurdeep-osahan-inner-header position-absolute w-100">

    <div class="center mx-auto"></div>

 </div>
 <div>
    <section class="position-relative">
       <span class="position-absolute title_sign text-white text-center">
       <a href="{{url('/')}}/mobile">
       <img src="{{asset('uploads/VENSHAQ001-41.png')}}" class="height-70" alt="logos" />
       </a>
       </span>
       <img src="{{asset('mobileTheme/img/covertop.jpg')}}" class="img-fluid">
    </section>
    <section class="bg-white body_rounded mt-n5 position-relative p-4">
        <h5 class="mb-3">Forgot Password</h5>
        <p class="text-muted small mb-5">Please enter your email address. You will receive a link to create a new password via email.</p>
        <form id="forgot-password" action="{{ route('password.email') }}" method="POST">
            @csrf
           <input name="email" class="form-control bg-dark search_item p-3 box_rounded border-0 text-white" type="email" placeholder="Enter your email">
           <div class="p-4 fixed-bottom">
              <button type="submit" class="btn btn-danger btn-block box_rounded w-100 py-3">Send</button>
           </div>
           <br>
           <div class="text-center">
             <img width="30" src="{{asset('/mobileTheme/img/loading.gif')}}" class="loading-img">
          </div>
        </form>
     </section>
 </div>
 @include('mobile.main-nav')

@endsection
