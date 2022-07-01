@extends('mobile.master-sign')

@section('content')
<div class="d-flex align-items-center p-3 gurdeep-osahan-inner-header position-absolute w-100">
    <div class="left mr-auto">
       <a href="{{url('/')}}/mobile/profile" class="back_button"><i class="btn_detail shadow-sm mdi mdi-chevron-left bg-dark text-white shadow-sm"></i></a>
    </div>
    <div class="center mx-auto"></div>
    {{-- <div class="right ml-auto d-flex align-items-center">
       <a class="toggle btn_detail text-white" href="#">
          Skip <i class="btn_detail shadow-sm mdi mdi-chevron-right bg-dark text-white shadow-sm"></i>
       </a>
    </div> --}}
    <div class="left">
        <a href="{{url('/')}}/mobile/get-started" class="back_button box_rounded bg-white text-danger btn btn-sm shadow-sm">Skip</a>
     </div>
 </div>
 <div class="padding_bottom">
    <section class="position-relative">
       <span class="position-absolute title_sign text-white text-center">
       <a href="{{url('/')}}/mobile/get-started">
       <img src="{{asset('uploads/VENSHAQ001-41.png')}}" class="height-70" alt="logo" />
       </a>
       </span>
       <img src="{{asset('mobileTheme/img/covertop.jpg')}}" class="img-fluid">
    </section>
    <section class="bg-white body_rounded mt-n5 position-relative p-4">
       <h5 class="mb-3">Verify your phone number</h5>
       <p class="text-muted small mb-5">We have sent you an sms with a code to number (+41) 10492490</p>
       <form class="" id="Veryfy-Form" action="{{url('/')}}/mobile/send-verification">
          @csrf
          <input class="form-control bg-dark search_item p-3 box_rounded border-0 text-white" name="mobile" value="{{Auth::User()->mobile}}" type="text" placeholder="Enter Phone Number">
          {{-- <div class="p-4 fixed-bottom">
             <a href="{{url('/')}}/mobile/verification-code" class="btn btn-danger btn-block box_rounded w-100 py-3">Send</a>
          </div> --}}
          <input type="hidden" value="Auth::User()->id" name="user">
          <div class="p-4 fixed-bottom">
            <button type="submit" class="btn btn-danger btn-block box_rounded w-100 py-3">Send</button>
            <br>
            <div class="text-center">
                <img width="30" src="{{asset('/mobileTheme/img/loading.gif')}}" class="loading-img">
            </div>
          </div>

       </form>
    </section>
 </div>
 @include('mobile.main-nav')
@endsection
