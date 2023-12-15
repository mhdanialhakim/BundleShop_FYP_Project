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
        <li class="breadcrumb-item active">Add New Product</li>
    </ol>
</div>
@endsection
@section('cardTitle')
<div class="card-header">
    <h4 class="card-title">Add New Products</h4>
</div>
@endsection
@section('content')
<div class="card-body">
    <div class="form-validation">
        <form action="{{ route('store-product') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" style="color:black" >Image <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="file" class="form-control" name="image" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" style="color:black">Product Name <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pname" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" style="color:black" for="val-skill">Category <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <select class="form-control" name="pcategory">
                        <option value="">Select category</option>
                        <option value="Hoodie">Hoodie</option>
                        <option value="Shirt">Shirt</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" style="color:black" >Brand <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pbrand" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" style="color:black" >Grade <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pgrade" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" style="color:black" >Color <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pcolor" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" style="color:black" for="val-skill">Size <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <select class="form-control" name="psize">
                        <option value="">Select size</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label" style="color:black" >Price (RM) <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="pprize" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                    <input type="hidden" name="pavailability" value="Available">
            </div>
            <br>
            <div class="form-group row">
                <div class="col-lg-7 ml-auto">
                    <button type="submit" class="btn btn-square btn-dark">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection