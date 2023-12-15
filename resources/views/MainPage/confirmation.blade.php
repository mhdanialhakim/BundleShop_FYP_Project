@extends('layouts.shopinterface')
<title>Thieves Thrift | Order Confirm</title>
@section('confirmation')
<section class="page-wrapper success-msg">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
              <i class="tf-ion-android-checkmark-circle"></i>
            <h2 class="text-center">Thank you! For your payment</h2>
            <p>Your order will be prepare soon.</p>
            <a href="{{ url('shop') }}" class="btn btn-main mt-20">Continue Shopping</a>
            <a href="{{ url('orders') }}" class="btn btn-main mt-20">View My Order</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection