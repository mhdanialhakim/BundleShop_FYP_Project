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
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col" colspan="4"><h6>Order Status & Details:</h6></th>
                        </tr>
                        <tr>
                            <th scope="col"><h6>Receive Order</h6></th>
                            <th scope="col"><h6>Status</h6></th>
                            <th scope="col"><h6>Delivery Staus</h6></th>
                            <th scope="col"><h6>Action</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <label style="color:grey">{{ $order->created_at->format('d F Y') }}</label>
                        </td>
                        <td>
                            <label class="badge badge-primary">{{ $order->payment_status }}</label>
                        </td>
                        <td>
                            @if($order->delivery_status=='Preparing')
                                <label class="badge badge-warning">{{ $order->delivery_status }}</label>
                            @elseif($order->delivery_status=='Hold/Delayed')
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
                            <a href="{{ url('delivered',$order->orderid) }}" onClick="return confirm('Are you sure this order is delivered?')" class="btn btn-square btn-outline-dark">
                                Delivered
                            </a>
                            <a href="{{ url('hold_delayed',$order->orderid) }}" onClick="return confirm('Are you sure hold/delayed this order?')" class="btn btn-square btn-outline-dark">
                                Hold/Delayed
                            </a>
                            <a href="{{ url('admin_cancel',$order->orderid) }}" onClick="return confirm('Are you sure to cancel this order?')" class="btn btn-square btn-outline-dark">
                                Cancel
                            </a>
                            @elseif($order->delivery_status=='Hold/Delayed')
                            <a href="{{ url('delivered',$order->orderid) }}" onClick="return confirm('Are you sure this order is delivered?')" class="btn btn-square btn-outline-dark">
                                Delivered
                            </a>
                            <a href="{{ url('admin_cancel',$order->orderid) }}" onClick="return confirm('Are you sure to cancel this order?')" class="btn btn-square btn-outline-dark">
                                Cancel
                            </a>
                            @elseif($order->delivery_status=='Cancelled')
                                <i style="color:red">Cancelled by Buyer</i>
                            @elseif($order->delivery_status=='Cancel')
                                <i style="color:red">Cancelled</i>
                            @elseif($order->delivery_status=='Delivered')
                                <i>Delivered</i>
                            @endif
                        </td>
                    </tbody>
                </table>
                <br>
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col" colspan="7"><h6>Product Details:</h6></th>
                        </tr>
                        <tr>
                            <th scope="col"><h6>Product Name</h6></th>
                            <th scope="col"><h6>Price</h6></th>
                            <th scope="col"><h6>Size</h6></th>
                            <th scope="col"><h6>Color</h6></th>
                            <th scope="col"><h6>Category</h6></th>
                            <th scope="col"><h6>Brand</h6></th>
                            <th scope="col"><h6>Grade</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <label style="color:grey">{{ $order->product_name }}</label>
                        </td>
                        <td>
                            <label style="color:grey">RM {{ $order->product_price }}.00</label>
                        </td>
                        <td>
                            <label style="color:grey">{{ $order->product_size }}</label>
                        </td>
                        <td>
                            <label style="color:grey">{{ $order->product_color}}</label>
                        </td>
                        <td>
                            <label style="color:grey">{{ $order->product_category }}</label>
                        </td>
                        <td>
                            <label style="color:grey">{{ $order->product_brand }}</label>
                        </td>
                        <td>
                            <label style="color:grey">{{ $order->product_grade }}</label>
                        </td>
                    </tbody>
                </table>
                <br>
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col" colspan="4"><h6>Buyer Details:</h6></th>
                        </tr>
                        <tr>
                            <th scope="col"><h6>Name</h6></th>
                            <th scope="col"><h6>Address</h6></th>
                            <th scope="col"><h6>Phone Number</h6></th>
                            <th scope="col"><h6>Email</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <label style="color:grey">{{ $order->user_name }}</label>
                        </td>
                        <td>
                            <label style="color:grey">{{ $order->user_address }}</label>
                        </td>
                        <td>
                            <label style="color:grey">0{{ $order->user_pnumber }}</label>
                        </td>
                        <td>
                            <label style="color:grey">{{ $order->user_email}}</label>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
@endsection
