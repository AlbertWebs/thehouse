@extends('front.master')

@section('content')
	<!-- Page Title -->
    <section class="page-title" style="background-image: url('{{asset('theme/images/background/10.jpg')}}')">
    	<div class="auto-container">
			<h1>Food Basket</h1>
			<ul class="page-breadcrumb">
				<li><a href="{{url('/')}}">home</a></li>
				<li><a href="{{url('/')}}/menu">Menu</a></li>
				<li>Food Basket</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Cart Section -->
    <section class="cart-section style-two">
        <div class="auto-container">
            <div class="row clearfix">

				<!-- Table Column -->
				<div class="table-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<!--Cart Outer-->
						<div class="cart-outer">
							<div class="table-outer">
								<table class="cart-table">
									<thead class="cart-header">
										<tr>
											<th class="prod-column">Product Name</th>
											<th class="price">Price</th>
											<th>Quantity</th>
											<th>Remove</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td class="prod-column">
												<div class="column-box">
													<figure class="prod-thumb"><a href="#"><img src="images/resource/products/shop-thumb-1.jpg" alt=""></a></figure>
													<h6 class="prod-title">Bacon Burger</h6>
												</div>
											</td>
											<td class="price">$24.00</td>
											<td class="qty"><div class="item-quantity"><div class="quantity-spinner"><button type="button" class="minus"><span class="fa fa-minus"></span></button><input type="text" name="product" value="2" class="prod_qty" /><button type="button" class="plus"><span class="fa fa-plus"></span></button></div></div></td>
											<td class="remove-btn"><a href="#" class="fa fa-trash-o"></a></td>
										</tr>

										<tr>
											<td class="prod-column">
												<div class="column-box">
													<figure class="prod-thumb"><a href="#"><img src="images/resource/products/shop-thumb-1.jpg" alt=""></a></figure>
													<h6 class="prod-title">Bacon Burger</h6>
												</div>
											</td>
											<td class="price">$24.00</td>
											<td class="qty"><div class="item-quantity"><div class="quantity-spinner"><button type="button" class="minus"><span class="fa fa-minus"></span></button><input type="text" name="product" value="2" class="prod_qty" /><button type="button" class="plus"><span class="fa fa-plus"></span></button></div></div></td>
											<td class="remove-btn"><a href="#" class="fa fa-trash-o"></a></td>
										</tr>
										<tr>
											<td class="prod-column">
												<div class="column-box">
													<figure class="prod-thumb"><a href="#"><img src="images/resource/products/shop-thumb-1.jpg" alt=""></a></figure>
													<h6 class="prod-title">Bacon Burger</h6>
												</div>
											</td>
											<td class="price">$24.00</td>
											<td class="qty"><div class="item-quantity"><div class="quantity-spinner"><button type="button" class="minus"><span class="fa fa-minus"></span></button><input type="text" name="product" value="2" class="prod_qty" /><button type="button" class="plus"><span class="fa fa-plus"></span></button></div></div></td>
											<td class="remove-btn"><a href="#" class="fa fa-trash-o"></a></td>
										</tr>
                                        <tr>
                                            {{-- Add Drinks --}}
                                        </tr>

									</tbody>

								</table>

							</div>
						   </div>

						   <!-- Coupon Outer -->
						{{-- <div class="coupon-outer clearfix">
							<div class="pull-left">
								<div class="apply-coupon clearfix">
									<div class="form-group clearfix">
										<input type="text" name="coupon-code" value="" placeholder="Coupon Code">
									</div>
									<div class="form-group clearfix">
										<button type="button" class="theme-btn coupon-btn btn-style-three"><span class="txt">Apply Coupon</span></button>
									</div>
								</div>
							</div>

							<div class="pull-right">
								<button type="button" class="theme-btn btn-style-three"><span class="txt">Update Cart</span></button>
							</div>

						</div> --}}

					</div>
				</div>

				<!-- Total Column -->
				<div class="total-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
						<h4>Subtotal</h4>
						<ul class="sub-total-list">
							<li class="clearfix">
								<div class="pull-left">
									<strong>Subtotal</strong>
								</div>
								<div class="pull-right">
									$24.00
								</div>
							</li>
							<li class="clearfix">
								<div class="pull-left">
									<strong>Shipping</strong>
								</div>
								<div class="pull-right">
									<span>Flat rate: $24.00 <br>Express Delivery <br>In Stock</span>
								</div>
							</li>
							<li class="clearfix">
								<div class="pull-left">
									<strong>Total</strong>
								</div>
								<div class="pull-right">
									$30.00
								</div>
							</li>
						</ul>
						<a href="{{url('/')}}/shopping-cart/checkout" class="theme-btn checkout-btn">Proceed To Checkout</a>
					</div>
				</div>

			</div>

        </div>
    </section>
	<!-- End Cart Section -->

@include('front.instagram')
@endsection
