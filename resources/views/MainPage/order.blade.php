@extends('layouts.shopinterface')
<title>Thieves Thrift | Order</title>
@section('header')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Orders</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('shop') }}">Shop</a></li>
                        <li class="active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('orders')
<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Item</th>
                                    <th></th>
									<th>Total Price</th>
									<th>Order Status</th>
									<th></th>
								</tr>
							</thead>
                            @foreach( $order as $order )
							<tbody>
                                <tr>
                                    <td>
                                        #{{ $order->orderid }}
                                    </td>
                                    <td>
                                        {{ $order->created_at->format('d F Y') }}
                                    </td>
                                    <td>
                                        <img width="60" src="images/{{ $order->product_image }}">
                                        
                                    </td>
                                    <td>
                                        <a>{{ $order->product_name }}</a><br> 
                                        Brand: {{ $order->product_brand }}, Size: {{ $order->product_size }}, Grade: {{ $order->product_grade }}, Color: {{ $order->product_color }}<br>
                                        <h6> Deliver Address: <br>{{ $order->user_address }}</h6>
                                    </td>
                                    <td>
                                        RM {{ $order->product_price }}.00
                                    </td>
                                        @if($order->delivery_status=='Preparing')
                                            <td><span class="label label-warning">{{  $order->delivery_status }}</span></td>
                                        @elseif($order->delivery_status=='Hold/Delayed')
                                            <td><span class="label label-warning">{{  $order->delivery_status }}</span></td>
                                        @elseif($order->delivery_status=='Delivered')
                                            <td><span class="label label-info">{{  $order->delivery_status }}</span></td>
                                        @elseif($order->delivery_status=='Received')
                                            <td><span class="label label-success">{{  $order->delivery_status }}</span></td>
                                        @elseif($order->delivery_status=='Cancel')
                                        <td><span class="label label-danger">{{  $order->delivery_status }} by seller</span><br><h6>Refund process within 1 week</h6></td>
                                        @else
                                            <td><span class="label label-danger">{{  $order->delivery_status }}</span></td>
                                        @endif
                                    <td>
                                        @if($order->delivery_status=='Preparing')
                                            <a onclick = "return confirm('Are you sure to Cancel this order?')" href="{{ url('cancel_order', $order->orderid) }}" class="btn btn-default">Cancel Order</a>
                                        @elseif($order->delivery_status=='Delivered')
                                            <a onclick = "return confirm('Are you sure you received this order?')" href="{{ url('receive_order', $order->orderid) }}" class="btn btn-default">Receive Order</a>
                                        @endif
                                    </td>
								</tr>
							</tbody>
                            @endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection