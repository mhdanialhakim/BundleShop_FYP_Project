@extends('layouts.shopinterface')
<title>Thieves Thrift | Cart</title>
@section('header')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Cart</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('shop') }}">Shop</a></li>
                        <li class="active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
@if (count($cart) > 0)
<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
              <form method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Product</th>
                      <th class="">Price</th>
                      <th class="">Catgory</th>
                      <th class="">Grade</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <?php $totalprice=0; ?>
                  @foreach( $cart as $cart )
                  <tbody>                   
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="images/{{ $cart->product_image }}" alt="" />
                          <a>{{ $cart->product_name }}, Size: {{ $cart->product_size }}</a>
                        </div>
                      </td>
                      <td class="">
                        RM {{ $cart->product_price }}.00
                      </td>
                      <td class="">
                        {{ $cart->product_category }}
                      </td>
                      <td class="">
                        {{ $cart->product_grade }}
                      </td>
                      <td class="">
                        <a class="product-remove" onclick="return confirm('Are you sure to remove?')" href="{{ url('remove_cart',$cart->cartid) }}">Remove</a>
                      </td>
                    </tr>                    
                  </tbody>
                  <?php $totalprice=$totalprice + $cart->product_price ?>
                  @endforeach
                </table>

                @if($disableCheckout)
                    <p class="pull-right text-danger">
                      Unable to Checkout because the following products are no longer available: 
                      {{ implode(', ', $existingProducts) }}.
                    </p><br><br>
                    <a class="btn btn-main pull-right" disabled>Checkout</a>                   
                @else
                    <a class="pull-right">Total: RM {{ $totalprice }}.00</a><br><br>
                    <a href="{{ url('checkout_page') }}" class="btn btn-main pull-right">Checkout</a>                   
                @endif
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@else
<section class="empty-cart page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
        	<i class="tf-ion-ios-cart-outline"></i>
          	<h2 class="text-center">Your cart is currently empty.</h2>
          	<p>Browse our product.</p>
          	<a href="{{ url('shop') }}" class="btn btn-main mt-20">Return to shop</a>
      </div>
    </div>
  </div>
</section>
@endif
@endsection