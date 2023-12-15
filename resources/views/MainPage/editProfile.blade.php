@extends('layouts.shopinterface')
<title>Thieves Thrift | My Profile</title>
@section('header')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Edit My Profile</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('home') }}">Home</a></li>
                        <li><a href="{{ url('profile') }}">My Profile</a></li>
                        <li class="active">Edit My Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('profile')
<section class="user-dashboard page-wrapper">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-common" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="tf-ion-android-checkbox-outline"></i><span>{{ session('success') }} </span>
        </div>
    @endif
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {{-- <ul class="list-inline dashboard-menu text-center">
            <li><a href="{{ url('orders') }}">Orders</a></li>
            <li><a class="active"  href="{{ route('profile') }}">Profile Details</a></li>
          </ul> --}}
          <form method="POST" action="{{ url('update_profile', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')
          <div class="dashboard-wrapper dashboard-user-profile">           
            <div class="media">
                <div class="pull-left text-center" href="#!">
                    <img class="media-object user-img" src="{{ asset('assets2/images/user.png') }}" alt="Image">
                    <a href="#x" class="btn btn-transparent mt-20"></a>
                  </div>
              <div class="media-body">
                <ul class="user-profile-list">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">Full Name:</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">Email:</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="address" class="col-md-2 col-form-label text-md-right">Address:</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}" required autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">Phone Number:</label>
                        <div class="col-md-6">
                            <input id="pnumber" type="tel" class="form-control" name="pnumber" value="0{{ old('pnumber', $user->pnumber) }}" required autofocus>
                            @error('pnumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </ul>
                
              </div>            
            </div>  
            <div class="form-group row mb-2 text-center">
                <button type="submit" class="btn btn-default">
                    Submit
                </button>
            </div>         
        </div>   
        </form>
        </div>
      </div>
    </div>
  </section>
  @endsection