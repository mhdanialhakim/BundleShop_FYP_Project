@extends('layout.adminInterface')
@section('linkPages')
<div class="col-sm-6 p-md-0">
  <div class="welcome-text">
      <p class="mb-0">Thieves Thirft Admin</p>
  </div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('index-order') }}">Table Order</a></li>
      <li class="breadcrumb-item active">Order Details</li>
  </ol>
</div>
@endsection
@section('cardTitle')
<div class="card-header">
    <h4 class="card-title">Order Details</h4>
</div>
@endsection
@section('content')

<div class="basic-elements">
    <form>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label style="color:black"></label>
                    <img src="{{ asset('images/'.$order->product_image) }}" width="300">
                </div>             
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                    <h5>Order Status Details:</h5>
                </div>
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Receive Order</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Delivery Staus</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <label style="color:black">{{ $order->created_at->format('d F Y') }}</label>
                        </td>
                        <td>
                            <label class="badge badge-primary">{{ $order->payment_status }}</label>
                        </td>
                        <td>
                            @if($order->delivery_status=='Preparing')
                                <label class="badge badge-warning">{{ $order->delivery_status }}</label>
                            @elseif($order->delivery_status=='Delivered')
                                <label class="badge badge-info">{{ $order->delivery_status }}</label>
                            @elseif($order->delivery_status=='Received')
                                <label class="badge badge-success">{{ $order->delivery_status }}</label>
                            @else
                                <label class="badge badge-danger">{{ $order->delivery_status }}</label>
                            @endif                           
                        </td>
                        <td>
                            @if($order->delivery_status=='Preparing')
                            <a href="{{ url('delivered',$order->orderid) }}" onClick="return confirm('Are you sure this product is delivered?')" class="btn btn-square btn-outline-dark">
                                Delivered
                            </a>
                            @elseif($order->delivery_status=='Canceled')
                            <i style="color:red">Canceled by Buyer</i>
                            @else
                            <i>Delivered</i>
                            @endif
                        </td>
                    </tbody>
                </table>
                <br>
                <div class="form-group">
                    <h5>Product Details:</h5>
                </div>
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Size</th>
                            <th scope="col">Color</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <label style="color:black">{{ $order->product_name }}</label>
                        </td>
                        <td>
                            <label style="color:black">RM {{ $order->product_price }}.00</label>
                        </td>
                        <td>
                            <label style="color:black">{{ $order->product_size }}</label>
                        </td>
                        <td>
                            <label style="color:black">{{ $order->product_color}}</label>
                        </td>
                        <td>
                            <label style="color:black">{{ $order->product_category }}</label>
                        </td>
                        <td>
                            <label style="color:black">{{ $order->product_brand }}</label>
                        </td>
                        <td>
                            <label style="color:black">{{ $order->product_grade }}</label>
                        </td>
                    </tbody>
                </table>
                <br>
                <div class="form-group">
                    <h5>User Details:</h5>
                </div>
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <label style="color:black">{{ $order->user_name }}</label>
                        </td>
                        <td>
                            <label style="color:black">{{ $order->user_address }}</label>
                        </td>
                        <td>
                            <label style="color:black">0{{ $order->user_pnumber }}</label>
                        </td>
                        <td>
                            <label style="color:black">{{ $order->user_email}}</label>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
@endsection
