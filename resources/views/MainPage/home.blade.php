@extends('layouts.shopinterface')
<title>Thieves Thrift | Home</title>
@section('home')
@if(session('success'))
    <div class="alert alert-success alert-common" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="tf-ion-android-checkbox-outline"></i><span>{{ session('success') }} </span>
    </div>
@endif
<div class="hero-slider">
    @foreach ( $product as $productItem )
    <div class="slider-item th-fullpage hero-area" style="background-image: url('{{ asset('images/'.$productItem->image) }}');background-position: center center; background-size: 41% auto;">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 text-center">
            <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
            <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
            <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{ url('shop') }}">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>

<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>New Arrival</h2>
			</div>
		</div>
		<div class="row">
			@foreach( $latestProduct as $latestProduct )
			@if($latestProduct->pavailability=='Available')
			<div class="col-md-4">
				<div class="product-item">
					<a href="{{ route('product',['id'=>$latestProduct->pid]) }}">
					<div class="product-thumb">
						<span class="bage">New!</span>
						<img class="img-responsive" src="images/{{ $latestProduct->image }}" alt="product-img" />
						<div class="preview-meta">
                            <form action="{{ url('add_cart',$latestProduct->pid) }}" method="Post">
                                @csrf
                                <button class="btn btn-small btn-solid-border">
                                    Add To Cart <i class="tf-ion-android-cart"></i>
                                </button>
                            </form>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="{{ route('product',['id'=>$latestProduct->pid]) }}">{{  $latestProduct->pname }}</a></h4>
						<p class="price">RM{{  $latestProduct->pprice }}.00</p>
					</div>
				</div>
			</div>
			@endif
            @endforeach
        </div>
	</div>
</section>

@endsection