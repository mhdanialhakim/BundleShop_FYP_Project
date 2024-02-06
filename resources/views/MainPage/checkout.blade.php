@extends('layouts.shopinterface')
<title>Thieves Thrift | Checkout</title>
@section('header')
<section class="page-header">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="content">
				<h1 class="page-name">Checkout</h1>
				<ol class="breadcrumb">
					<li><a href="{{ url('shop') }}">Shop</a></li>
                    <li class="active">Checkout</li>
				</ol>
			</div>
		</div>
	</div>
</div>
</section>
@endsection
@section('checkout')
<div class="page-wrapper">
    <div class="checkout shopping">
       <div class="container">
          <div class="row">
             <div class="col-md-8">
                <div class="block">
                   <h4 class="widget-title">Payment Method</h4>
                   <p>Credit Cart Details (Secure payment)</p>
                   <div class="checkout-product-details">
                      <div class="payment">
                         <div class="card-details">
                            <form  class="checkout-form">
                               <div class="form-group">
                                  <label for="card-number">Card Number <span class="required">*</span></label>
                                  <input  id="card-number" class="form-control"   type="tel" placeholder="•••• •••• •••• ••••">
                               </div>
                               <div class="form-group half-width padding-right">
                                  <label for="card-expiry">Expiry (MM/YY) <span class="required">*</span></label>
                                  <input id="card-expiry" class="form-control" type="tel" placeholder="MM / YY">
                               </div>
                               <div class="form-group half-width padding-left">
                                  <label for="card-cvc">Card Code <span class="required">*</span></label>
                                  <input id="card-cvc" class="form-control"  type="tel" maxlength="4" placeholder="CVC" >
                               </div>
                               <a href="{{ url('checkout_order') }}" class="btn btn-main mt-20">Place Order</a >
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-md-4">
                <div class="product-checkout-details">
                   <div class="block">
                      <h4 class="widget-title">Order Summary</h4>
                      <?php $totalprice=0; ?>
                      @foreach( $cart as $cart)
                      <div class="media product-card">
                         <a class="pull-left">
                            <img class="media-object" src="images/{{ $cart->product_image }}" alt="Image" />
                         </a>
                         <div class="media-body">
                            <h3 class="media-heading"><a>{{ $cart->product_name }}</a></h3>
                            <h6>Deliver Address:<br><p>{{ $user->address }}</p></h6>
                            <a class="price">RM {{ $cart->product_price }}.00</a><br>
                            <span class="remove"><a href="{{ route('update_profile_form',['id'=>$user->id]) }}" >Change address</a></span>
                            {{-- <span class="remove"><a onclick="return confirm('Are you sure to remove?')" href="{{ url('remove_cart',$cart->cartid) }}" >Remove</a></span> --}}
                         </div>
                      </div>
                      <?php $totalprice=$totalprice + $cart->product_price ?>
                      @endforeach
                      <ul class="summary-prices">

                      </ul>
                      <div class="summary-total">
                         <span>Total</span>
                         <span>RM {{ $totalprice }}.00</span>
                      </div>
                      <div class="verified-icon">
                         <img src="{{ asset('assets2/images/shop/verified.png') }}">
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 @endsection