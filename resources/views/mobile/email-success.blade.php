@extends('mobile.master-sign')

@section('content')
<div class="d-flex align-items-center p-3 gurdeep-osahan-inner-header position-absolute w-100">

    <div class="center mx-auto"></div>

 </div>
 <div>
    <section class="position-relative">
        <br><br><br>
     </section>
    <section class="align-items-center p-3 gurdeep-osahan-inner-header w-100">
        <center style="max-width:80%; text-align:center; margin:0 auto; padding:20px; font-weight:800">
            <h5 class="mb-3 text-success center" >Success! Your Reset Link Has Been Sent To Your Email</h5>
            <span style="font-size:60px; font-weight:800" class="mdi mdi-check text-success text-center"></span>
        </center>
        <a href="https://gmail.com" class="mt-4 btn btn-outline-danger py-3 box_rounded w-100"><span class="mdi mdi-email-outline"></span> Open Gmail</a>
     </section>
 </div>
 @include('mobile.main-nav')

@endsection
