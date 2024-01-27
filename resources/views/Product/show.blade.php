@extends('layout.adminInterface')
@section('linkPages')
<div class="col-sm-6 p-md-0">
  <div class="welcome-text">
      <p class="mb-0">Thieves Thirft Admin</p>
  </div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('index-product') }}">Table Product</a></li>
      <li class="breadcrumb-item active">Product Details</li>
  </ol>
</div>
@endsection
@section('cardTitle')
<div class="card-header">
    <h4 class="card-title">Product Details</h4>
</div>
@endsection
@section('content')
{{-- <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
              
                <div class="card-body">
                  <a class="" href="index.html"> <h3>Product Detail</h3></a><br>
                    <div class="form-validation">
                        <form>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Product Image:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                    <img src="{{ asset('images/'.$model->image) }}" width="150" height="180">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Product Name:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->pname }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-skill"><h6>Product Category:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->pcategory }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Product Brand:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->pbrand }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Product Grade:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->pgrade }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Product Color:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->pcolor }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Product Size:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->psize }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="basic-elements">
    <form>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label style="color:black"></label>
                    <img src="{{ asset('images/'.$model->image) }}" width="300">
                </div>             
            </div>
            <div class="col-lg-7">
                <br>
                <div class="form-group">
                    {{-- <h3 style="color:black">Name: </h3> --}}
                    <h1 style="color:black">{{ $model->pname }}</h1>
                </div>
                <div class="form-group">
                    {{-- <label style="color:black">Price: </label> --}}
                    <h3 style="color:black">RM {{ $model->pprice }}.00</h3>
                </div>

                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Availability</th>
                            <th scope="col">Size</th>
                            <th scope="col">Color</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($model->pavailability == 'Available')
                        <td><label class="badge badge-success">{{ $model->pavailability }}</label></td>
                        @else
                        <td><label class="badge badge-danger">{{ $model->pavailability }}</label></td>
                        @endif
                        <td><label style="color:black">{{ $model->psize }}</label></td>
                        <td><label style="color:black">{{ $model->pcolor }}</label></td>
                        <td><label style="color:black">{{ $model->pcategory }}</label></td>
                        <td><label style="color:black">{{ $model->pbrand }}</label></td>
                        <td><label style="color:black">{{ $model->pgrade }}</label></td>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
@endsection
