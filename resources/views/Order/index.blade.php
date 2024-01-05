@extends('layout.adminInterface')
@section('linkPages')
<div class="col-sm-6 p-md-0">
    <div class="welcome-text">
        <h4>Hi, {{ Auth::user()->name }}.</h4>
        <p class="mb-0">Thieves Thirft Admin</p>
    </div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">All Order</li>
    </ol>
</div>
@endsection
@section('cardTitle')
<div class="card-header">
    <h4 class="card-title">All Orders</h4>
</div>
@endsection
@section('content')
<div class="card-body">
<div class="table-responsive">
    <table class="table table-hover">
        <thead style="color:black">
            <tr>
                <th>Name</th>
                <th>Product Name</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Action</th>             
            </tr>
        </thead>
        <tbody style="color:grey">
            @foreach ( $order as $orders )
            <tr>
                <td>{{  $orders->user_name }}</td>
                <td>{{  $orders->product_name }}</td>
                <td ><span class="badge badge-primary" style="color:white">{{  $orders->payment_status }}</span></td>
                @if($orders->delivery_status=='Preparing')
                    <td><span class="badge badge-warning" style="color:white">{{  $orders->delivery_status }}</span></td>
                @elseif($orders->delivery_status=='Delivered')
                    <td><span class="badge badge-info" style="color:white">{{  $orders->delivery_status }}</span></td>
                @elseif($orders->delivery_status=='Received')
                    <td><span class="badge badge-success" style="color:white">{{  $orders->delivery_status }}</span></td>
                @else
                    <td><span class="badge badge-danger" style="color:white">{{  $orders->delivery_status }}</span></td>
                @endif
                <td>
                    @if($orders->delivery_status=='Preparing')
                    <a href="{{ url('delivered',$orders->orderid) }}" onClick="return confirm('Are you sure this product is delivered?')" class="btn btn-square btn-outline-dark">
                        Delivered
                    </a>
                    @elseif($orders->delivery_status=='Canceled')
                    <i style="color:red">Canceled by Buyer</i>
                    @else
                    <i>Delivered</i>
                    @endif
                </td>
                <td>
                    <form action="{{ route('show-order',['id'=>$orders->orderid]) }}" class="d-inline">
                        <button class="btn btn-outline-light">
                            <i class="fa fa-eye"></i>
                        </button>
                    </form>
                                      
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $order->links() }}
</div>
@endsection