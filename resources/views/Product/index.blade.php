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
        <li class="breadcrumb-item active">Table Product</li>
    </ol>
</div>
@endsection
@section('cardTitle')
<div class="card-header">
    <h4 class="card-title">Products</h4>
</div>
@endsection
@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product
                        <form action="{{ route('addform-product') }}"  class="d-inline" >
                            <button class="btn btn-primary">
                                <i class="fa fa-plus"> </i>
                            </button>
                        </form>
                        </h4>
                        <div class="table-responsive">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <table class="table table-bordered table-striped verticle-middle">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Grade</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $model as $value )
                                    <tr>
                                        <td>{{  $value->pname }}</td>
                                        <td>{{  $value->pcategory }}</td>
                                        <td>{{  $value->pbrand }}</td>
                                        <td>{{  $value->pgrade }}</td>
                                        <td>{{  $value->pcolor }}</td>
                                        <td>{{  $value->psize }}</td>
                                        <td><img src="images/{{ $value->image }}" width="100" height="100"></td>
                                        <td>
                                            <form action="{{ route('show-product',['id'=>$value->pid]) }}" class="d-inline">
                                                <button class="btn btn-dark">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('editform-product',['id'=>$value->pid]) }}" class="d-inline">
                                                <button class="btn btn-primary" >
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('delete-product',['id'=>$value->pid]) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="card-header">
        <h4 class="card-title">
            <form action="{{ route('addform-product') }}" class="d-inline">
                <button class="btn btn-square btn-dark">Product
                    <span class="btn-icon-right">
                        <i class="fa fa-plus"> </i>
                    </span>
                </button>
            </form>
        </h4>
</div>
<div class="card-body">
<div class="table-responsive">
    <table class="table table-hover">
        <thead style="color:black">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Availability</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style="color:grey">
            @foreach ( $model as $value )
            <tr>
                <td>{{  $value->pname }}</td>
                <td>{{  $value->pcategory }}</td>
                <td>{{  $value->pbrand }}</td>
                @if($value->pavailability == 'Available')
                <td><span class="badge badge-success" style="color:white">{{  $value->pavailability }}</td>
                @else
                <td><span class="badge badge-danger" style="color:white">{{  $value->pavailability }}</td>
                @endif
                <td>
                    <form action="{{ route('show-product',['id'=>$value->pid]) }}" class="d-inline">
                        <button class="btn btn-square btn-outline-dark">
                            <i class="fa fa-eye"></i>
                        </button>
                    </form>
                    <form action="{{ route('editform-product',['id'=>$value->pid]) }}" class="d-inline">
                        <button class="btn btn-square btn-outline-dark">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>
                    <form action="{{ route('delete-product',['id'=>$value->pid]) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                        <button class="btn btn-square btn-outline-danger" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $model->links() }}
</div>
@endsection