<nav id="main-nav">
    <ul class="second-nav">
       <li>
          <a href="{{url('/')}}/mobile/menu"><i class="mdi mdi-home mr-2"></i> Home</a>
       </li>

       <?php
            $Categories = DB::table('category')->get()
       ?>
       @foreach ($Categories as $item)
       <li>
        <a href="#"><i class="mdi mdi-timeline-check-outline mr-2"></i>{{$item->cat}}</a>
        <ul>
            <?php
                    $Menu = DB::table('menus')->where('cat_id',$item->id)->get()
            ?>
            @foreach ($Menu as $menu)
            <li><a href="cart1#html">{{$menu->title}}</a></li>
            @endforeach


        </ul>
     </li>
       @endforeach

       <li>
            <a href="{{url('/')}}/mobile/shopping-cart"><i class="mdi mdi-cart mr-2"></i>Your Cart(3)</a>

        </li>
        <li>
            <a href="{{url('/')}}/mobile/search"><i class="mdi mdi-magnify mr-2"></i>Search</a>

        </li>
       <li>
          <a href="{{url('/')}}/mobile/profile"><i class="mdi mdi-account-circle-outline mr-2"></i>My Profile</a>

       </li>

    </ul>
    </li>
    </ul>
    <ul class="bottom-nav">
       <li class="email">
          <a class="text-danger" href="home1#html">
             <p class="h5 m-0"><i class="mdi mdi-home"></i></p>
             Home
          </a>
       </li>
       <li class="github">
          <a href="faq#html">
             <p class="h5 m-0"><i class="mdi mdi-head-question-outline"></i></p>
             FAQ
          </a>
       </li>
       <li class="ko-fi">
          <a href="contact-us#html">
             <p class="h5 m-0"><i class="mdi mdi-headphones"></i></p>
             Help
          </a>
       </li>
    </ul>
 </nav>
