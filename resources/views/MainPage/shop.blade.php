@extends('layouts.shopinterface')
<title>Thieves Thrift | Shop</title>
@section('header')
<section class="page-header">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="content">
				<h1 class="page-name">Shop</h1>
				<ol class="breadcrumb">
					<li><a href="{{ url('home') }}">Home</a></li>
					<li class="active">Shop</li>
				</ol>
			</div>
		</div>
	</div>
</div>
</section>
@endsection
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-common" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="tf-ion-android-checkbox-outline"></i><span>{{ session('success') }} </span>
    </div>
@endif
<section class="products section">
	<div class="container">
		<div class="col-md-3">
			<div class="widget product-category">
				<h4 class="widget-title">Categories</h4>
				<div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							  <h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								  Grade
								</a>
							  </h4>
						</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<ul>
								<li><a href="{{ route('shop') }}">All</a></li>
								<li><a href="{{ route('shop', 'A') }}">A</a></li>
								<li><a href="{{ route('shop', 'B') }}">B</a></li>
								<li><a href="{{ route('shop', 'C') }}">C</a></li>
								<li><a href="{{ route('shop', 'D') }}">D</a></li>
							</ul>
						</div>
					</div>
				  </div>
				</div>				
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
		<div class="row">			
			@foreach ($model as $value)
			@if($value->pavailability=='Available')
			<div class="col-md-4">
				<div class="product-item">
					<a href="{{ route('product',['id'=>$value->pid]) }}">
					<div class="product-thumb" >
						{{-- <span class="bage">Sale</span> --}}
						<img class="img-responsive" src="{{ asset('images/' . $value->image) }}" alt="product-img">
						<div class="preview-meta">
								<form action="{{ url('add_cart',$value->pid) }}" method="Post">
									@csrf
									<button class="btn btn-small btn-solid-border">
										Add To Cart <i class="tf-ion-android-cart"></i>
									</button>
								</form>
							</ul>
                      	</div>						
					</div>
					</a>
					<div class="product-content">
						<h4><a href="{{ route('product',['id'=>$value->pid]) }}">{{  $value->pname }}</a></h4>
						<p class="price">RM{{  $value->pprize }}.00</p>
					</div>
				</div>
			</div>
			@endif
            @endforeach
        </div>
		</div>				
	</div>
	</div>
</section>
@endsection