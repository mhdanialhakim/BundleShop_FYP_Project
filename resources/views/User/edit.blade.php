@extends('layout.adminInterface')
@section('linkPages')
<div class="col-sm-6 p-md-0">
  <div class="welcome-text">
      <p class="mb-0">Thieves Thirft Admin</p>
  </div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('index-user') }}">Table User</a></li>
      <li class="breadcrumb-item active">Edit User Details</li>
  </ol>
</div>
@endsection
@section('cardTitle')
<div class="card-header">
    <h4 class="card-title">Edit User Details</h4>
</div>
@endsection
@section('content')
{{-- <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form action="{{ route('edit-user',['id'=>$model->id]) }}" method="POST" >
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Name: <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" value="{{ $model->name }}" name="cname" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-skill">Address: <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" value="{{ $model->address }}" name="caddress" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Email: <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" value="{{ $model->email }}" name="cemail" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Phone Number: <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" value="{{ $model->pnumber }}" name="cpnumber" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Birth Date: <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="date" class="form-control" value="{{ $model->datebirth }}" name="cdatebirth" >
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
    <form action="{{ route('edit-user',['id'=>$model->id]) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label style="color:black">Name: </label>
                    <input type="text" class="form-control" value="{{ $model->name }}" name="name">
                </div>
                <div class="form-group">
                    <label style="color:black">Email: </label>
                    <input type="email" class="form-control" value="{{ $model->email }}" name="email">
                </div>
                <div class="form-group">
                    <label style="color:black">Phone Number: </label>
                    <input type="tel" class="form-control" value="{{ $model->pnumber }}" name="pnumber">
                </div>
                <div class="form-group">
                    <label style="color:black">Birth Date: </label>
                    <input type="date" class="form-control" value="{{ $model->datebirth }}" name="datebirth">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label style="color:black">Address: </label>
                    <input type="text" class="form-control" rows="3" value="{{ $model->address }}" name="address">
                    {{-- <textarea class="form-control" rows="3" {{ $model->address }}" name="address"></textarea> --}}
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection