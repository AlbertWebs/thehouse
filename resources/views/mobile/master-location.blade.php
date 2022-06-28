<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Pilau, Hot Burgers, Nyama Choma, Mbuzi Choma, Beef, Pizza and More Powered By Shaq's House Limited">
      <meta name="author" content="Designekta Studios">
      <link rel="icon" type="image/png" href="{{asset('uploads/VENSHAQ001-41.png')}}">
      {{-- @include('favicon') --}}
      <title>Shaq's Choma Zone - Food Order Directory</title>
      <link rel="icon" type="image/png" href="{{asset('uploads/VENSHAQ001-41.png')}}">

      <link href="{{asset('mobileTheme/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('mobileTheme/vendor/icons/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="{{asset('mobileTheme/vendor/slick/slick.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('mobileTheme/vendor/slick/slick-theme.min.css')}}" />
      <link href="{{asset('mobileTheme/css/style.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('mobileTheme/vendor/sidebar/demo.css')}}" rel="stylesheet">


      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
      <script type="text/javascript">
        var geocoder;

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
      }
      //Get the latitude and the longitude;
      function successFunction(position) {
          var lat = position.coords.latitude;
          var lng = position.coords.longitude;
          codeLatLng(lat, lng)
      }

      function errorFunction(){
          alert("Geocoder failed");
      }

        function initialize() {
          geocoder = new google.maps.Geocoder();



        }

        function codeLatLng(lat, lng) {

          var latlng = new google.maps.LatLng(lat, lng);
          geocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
            console.log(results)
              if (results[1]) {
               //formatted address
               alert(results[0].formatted_address)
              //find country name
                   for (var i=0; i<results[0].address_components.length; i++) {
                  for (var b=0;b<results[0].address_components[i].types.length;b++) {
                      //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                      if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                          //this is the object you are looking for
                          city= results[0].address_components[i];
                          break;
                      }
                  }
              }
              //city data
              alert(city.short_name + " " + city.long_name)


              } else {
                alert("No results found");
              }
            } else {
              alert("Geocoder failed due to: " + status);
            }
          });
        }
      </script>

   </head>
   <body class="bg-light" onload="initialize()">
      @yield('content')
      <script src="{{asset('mobileTheme/vendor/jquery/jquery.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('mobileTheme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous" type="text/javascript"></script>
      <script type="text/javascript" src="{{asset('mobileTheme/vendor/slick/slick.min.js')}}"></script>
      <script type="1774f278b0e80a1ae5b262c9-text/javascript" src="{{asset('mobileTheme/vendor/sidebar/hc-offcanvas-nav.js')}}"></script>
      <script src="{{asset('mobileTheme/js/custom.js')}}" type="text/javascript"></script>
      <script src="{{asset('mobileTheme/vendor/scripts/rocket-loader.min.js')}}" defer=""></script>
      <script defer src="https://static.cloudflareinsights.com/beacon.min.js" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"71fc36dd4b75d73d","version":"2022.6.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>


   </body>
</html>
