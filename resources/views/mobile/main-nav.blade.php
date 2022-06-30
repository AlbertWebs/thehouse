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
        <a href="{{url('/')}}/mobile/menu/{{$item->slung}}"><i class="mdi mdi-timeline-check-outline mr-2"></i>{{$item->cat}}</a>
        <ul>
            <?php
                    $Menu = DB::table('menus')->where('cat_id',$item->id)->get()
            ?>
            @foreach ($Menu as $menu)
            <li><a href="{{url('/')}}/mobile/menus/{{$menu->slung}}">{{$menu->title}}</a></li>
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
       <li>
        <a target="new" href="https://tawk.to/chat/62b9a3dfb0d10b6f3e7981d9/1g6iig8kr"><i class="mdi mdi-comment mr-2"></i>Live Chat</a>

     </li>
       <li>
        <a href="{{url('/')}}/mobile/logout"><i class="mdi mdi-power mr-2"></i>Logout</a>

     </li>

    </ul>
    </li>
    </ul>
    <ul class="bottom-nav">
       <li class="email">
          <a class="text-danger" href="{{url('/')}}/mobile/get-started">
             <p class="h5 m-0"><i class="mdi mdi-home"></i></p>
             Home
          </a>
       </li>
       <li class="github">
          <a href="{{url('/')}}/mobile/shopping-cart">
             <p class="h5 m-0"><i class="mdi mdi-cart"></i></p>
             Your Cart
          </a>
       </li>
       <li class="ko-fi">
          <a href="tel:+254723014032">
             <p class="h5 m-0"><i class="mdi mdi-headphones"></i></p>
             Help
          </a>
       </li>
    </ul>
 </nav>
