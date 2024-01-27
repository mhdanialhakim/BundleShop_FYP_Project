@extends('layouts.shopinterface')
<title>Thieves Thrift | {{ $model->pname }}</title>
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-common" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="tf-ion-android-checkbox-outline"></i><span>{{ session('success') }} </span>
    </div>
@endif
<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('shop') }}">Shop</a></li>
					<li class="active">{{ $model->pname }}</li>
				</ol>
			</div>
		</div>
		<div class="row mt-15">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src="{{ asset('images/'.$model->image) }}" width="400">
								</div>								
							</div>
							
							<!-- sag sol -->
							{{-- <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
								<i class="tf-ion-ios-arrow-left"></i>
							</a>
							<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
								<i class="tf-ion-ios-arrow-right"></i>
							</a> --}}
						</div>
						
						<!-- thumb -->
						<ol class='carousel-indicators mCustomScrollbar meartlab'>
							<li data-target='#carousel-custom' data-slide-to='0' class='active'>
								<img src="{{ asset('images/'.$model->image) }}" />
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h1>{{ $model->pname }}</h1>
					<h3>RM{{ $model->pprice }}.00</h3>
					
					<p class="product-description mt-20">
						{{-- test --}}
					</p>

					<div class="product-size">
						<span>Brand:</span>
						{{ $model->pbrand }}
					</div>
					<br>
					<div class="color-swatches">
						<span>Color:</span>
							{{ $model->pcolor }}
					</div>
					<div class="product-size">
						<span>Grade:</span>
							{{ $model->pgrade }}
					</div>
					<div class="product-size">
						<span>Size:</span>
						{{ $model->psize }}
					</div>
					
					<div class="product-category">
						<span>Categories:</span>
						{{ $model->pcategory }}
					</div>
					<form action="{{ url('add_cart',$model->pid) }}" method="Post">
						@csrf
						<button class="btn btn-main mt-20">
							Add To Cart
						</button>
					</form>
				</div>
			</div>
	</div>
</section>
@endsection