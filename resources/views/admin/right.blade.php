<div id="right">


            <div class="well well-small">
                <ul class="list-unstyled">
                    <li>Admin &nbsp; : <span><?php $Admins = DB::table('admins')->get(); $Count = count($Admins); echo $Count ?></span></li>
                    <li>Users &nbsp; : <span><?php $Users = DB::table('users')->get(); $Count = count($Users); echo $Count ?></span></li>
                    <li>Subscribers &nbsp; : <span><?php $Subscribers = DB::table('subscribers')->get(); $Count = count($Subscribers); echo $Count ?></span></li>

                </ul>
            </div>
            <div class="well well-small">
                <button type="button" class="btn btn-block"> Help </button>
                <button type="button" onclick="window.open('{{url('/admin/Products_featured')}}','_self')" class="btn btn-primary btn-block"> Featured</button>
                <button type="button" onclick="window.open('{{url('/admin/Products_offer')}}','_self')" class="btn btn-primary btn-block"> Offers</button>
                <button type="button" onclick="window.open('{{url('/admin/categories')}}','_self')" class="btn btn-warning btn-block"> Categories</button>
                <button type="button" onclick="window.open('{{url('/admin/subscribers')}}','_self')" class="btn btn-success btn-block"> Subscribers </button>
                <button type="button" onclick="window.open('{{url('/admin/notifications')}}','_self')" class="btn btn-danger btn-block"> Notifications </button>
                <button type="button" onclick="window.open('{{url('/admin/discounts')}}','_self')" class="btn btn-danger btn-block"> Discounts </button>
                <button type="button" onclick="window.open('{{url('/admin/orders')}}','_self')" class="btn btn-danger btn-block"> Orders </button>
                <button type="button" onclick="window.open('{{url('/admin/updates')}}','_self')" class="btn btn-inverse btn-block"> Updates </button>
                <hr><center>Inactive Features</center><hr>
                <button type="button" onclick="window.open('{{url('/admin/slider')}}','_self')" class="btn btn-primary btn-block"> Sliders</button>
                <button type="button" onclick="window.open('{{url('/admin/banner')}}','_self')" class="btn btn-primary btn-block"> Banners</button>
                <button type="button" onclick="window.open('{{url('/admin/galleryList')}}','_self')" class="btn btn-primary btn-block"> Gallery</button>
                <button type="button" onclick="window.open('{{url('/admin/subCategories')}}','_self')" class="btn btn-warning btn-block"> Sub Categories</button>
                <button type="button" onclick="window.open('{{url('/admin/pages')}}','_self')" class="btn btn-info btn-block"> Pages</button>
                <button type="button" onclick="window.open('{{url('/admin/blog')}}','_self')" class="btn btn-info btn-block"> Blogs</button>
                <button type="button" onclick="window.open('{{url('/admin/traceServices')}}','_self')" class="btn btn-danger btn-block"> Active Service </button>
                <button type="button" onclick="window.open('{{url('/admin/service_rendered')}}','_self')" class="btn btn-info btn-block"> Services Delivered </button>
                <button type="button" onclick="window.open('{{url('/admin/testimonials')}}','_self')" class="btn btn-success btn-block"> Testimonials </button>
                <button type="button" onclick="window.open('{{url('/admin/daily')}}','_self')" class="btn btn-success btn-block"> Daily Quote </button>
                <button type="button" onclick="window.open('{{url('/admin/payments')}}','_self')" class="btn btn-danger btn-block"> Payments </button>
                <button type="button" onclick="window.open('{{url('/admin/pricing')}}','_self')" class="btn btn-danger btn-block"> Pricing </button>
                <button type="button" class="btn btn-warning btn-block"> Sales </button>

            </div>
            <div class="well well-small">
                <span>Profit</span><span class="pull-right"><small>20%</small></span>

                <div class="progress mini">
                    <div class="progress-bar progress-bar-info" style="width: 20%"></div>
                </div>
                <span>Sales</span><span class="pull-right"><small>40%</small></span>

                <div class="progress mini">
                    <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                </div>
                <span>Pending</span><span class="pull-right"><small>60%</small></span>

                <div class="progress mini">
                    <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
                </div>
                <span>Summary</span><span class="pull-right"><small>80%</small></span>

                <div class="progress mini">
                    <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
                </div>
            </div>




        </div>
