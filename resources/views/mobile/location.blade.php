@extends('mobile.master-location')

@section('content')
<div class="bg-white d-flex align-items-center p-3 gurdeep-osahan-inner-header shadow-sm mb-1">
    <div class="left mr-auto">
       <a href="{{url('/')}}/mobile" class="back_button">Skip</a>
    </div>
    <div class="center mx-auto"></div>
    <div class="right ml-auto d-flex align-items-center">
       <a href="#" class="fav_button mr-2"><i class="btn_detail mdi mdi-crosshairs-gps bg-light text-dark"></i></a>
       <a class="toggle btn_detail bg-light text-dark" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
             <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
       </a>
    </div>
 </div>
 <section>
    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d54784.595796125344!2d75.79344025952051!3d30.885619285392156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sfood%20points!5e0!3m2!1sen!2sin!4v1617257772304!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
 </section>
 <section class="bg-light body_rounded position-relative mt-n5 p-3">
    <h6 class="mb-3 fw-bold">Select Location</h6>
    <form class="form-floating pb-2 d-flex align-items-center mb-3">
       <input type="email" class="form-control bg-white border-0 shadow-sm form-control-sm" id="floatingInputValue" placeholder="" value="88 NANNIE HAVEN APT. 463">
       <label for="floatingInputValue">Your Location <a class="text-danger" href="#">Change</a></label>
    </form>
    <p class="text-muted small mb-2">TAG THIS LOCATION FOR LATER</p>
    <input type="radio" class="btn-check" name="options-outlined" id="home" autocomplete="off" checked>
    <label class="btn btn-outline-primary btn-sm px-3 rounded-3 mr-2" for="home">Home</label>
    <input type="radio" class="btn-check" name="options-outlined" id="work" autocomplete="off">
    <label class="btn btn-outline-primary btn-sm px-3 rounded-3 mr-2" for="work">Work</label>
    <input type="radio" class="btn-check" name="options-outlined" id="other" autocomplete="off">
    <label class="btn btn-outline-primary btn-sm px-3 rounded-3 mr-2" for="other">Other</label>
    <div class="p-3 fixed-bottom">
       <a href="{{url('/')}}/mobile" class="btn btn-danger btn-block box_rounded w-100 py-3">Save Address</a>
    </div>
 </section
@include('mobile.main-nav')
@endsection
