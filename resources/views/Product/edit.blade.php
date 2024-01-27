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
        <li class="breadcrumb-item active">Edit Product</li>
    </ol>
</div>
@endsection
@section('cardTitle')
<div class="card-header">
    <h4 class="card-title">Edit Product</h4>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form action="{{ route('edit-product',['id'=>$model->pid]) }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" ><img src="{{ asset('images/'.$model->image) }}" width="150">
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" style="color:black">Image <span class="text-danger"></span>
                                </label>
                                
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" style="color:black">Product Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" value="{{ $model->pname }}" name="pname" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" style="color:black" for="val-skill">Category <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="pcategory">
                                        <option value="{{ $model->pcategory }}">{{ $model->pcategory }}</option>
                                        <option value="Hoodie">Hoodie</option>
                                        <option value="Shirt">Shirt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" style="color:black" >Brand <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" value="{{ $model->pbrand }}" name="pbrand" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" style="color:black" >Grade <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" value="{{ $model->pgrade }}" name="pgrade" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" style="color:black" >Color <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="pcolor">
                                        <option value="{{ $model->pcolor }}">{{ $model->pcolor }}</option>
                                        <option value="Red" style="color:red">Red</option>
                                        <option value="Green" style="color:green">Green</option>
                                        <option value="Blue" style="color:blue">Blue</option>
                                        <option value="Purple" style="color:purple">Purple</option>
                                        <option value="Pink" style="color:pink">Pink</option>
                                        <option value="Yellow" style="color:yellow">Yellow</option>
                                        <option value="Orange" style="color:orange">Orange</option>
                                        <option value="Brown" style="color:brown">Brown</option>
                                        <option value="Black" style="color:black">Black</option>
                                        <option value="Grey" style="color:grey">Grey</option>
                                        <option value="White" style="color:white">White</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" style="color:black" for="val-skill">Size <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="psize">
                                        <option value="{{ $model->psize }}">{{ $model->psize }}</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" style="color:black" for="val-skill">Availability <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="pavailability">
                                        <option value="{{ $model->pavailability }}">{{ $model->pavailability }}</option>
                                        <option value="Available">Available</option>
                                        <option value="Not Available">Not Available</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" style="color:black" >Price (RM) <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" value="{{ $model->pprice }}" name="pprice" placeholder="">
                                </div>
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
            </div>
        </div>
    </div>
</div>
@endsection