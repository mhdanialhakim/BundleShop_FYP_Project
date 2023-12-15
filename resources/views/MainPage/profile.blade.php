@extends('layouts.shopinterface')
<title>Thieves Thrift | My Profile</title>
@section('header')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">My Profile</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('home') }}">Home</a></li>
                        <li class="active">My Profile</li>
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
          <div class="dashboard-wrapper dashboard-user-profile">
            <div class="media">
              <div class="pull-left text-center" href="#!">
                <img class="media-object user-img" src="{{ asset('assets2/images/user.png') }}" alt="Image">
                <a href="#x" class="btn btn-transparent mt-20"></a>
              </div>
              <div class="media-body">
                <ul class="user-profile-list">
                  <li><span>Full Name:</span>{{ $user->name }}</li>
                  <li><span>Email:</span>{{ $user->email }}</li>
                  <li><span>Address:</span>{{ $user->address }}</li>
                  <li><span>Phone:</span>0{{ $user->pnumber }}</li>
                  <li><span>Date of Birth:</span>{{ \Carbon\Carbon::parse($user->datebirth)->format('d F Y') }}</li>
                </ul>
              </div>
            </div>
            <div class="text-center">
            <a class="nav-link" href="{{ route('update_profile_form',['id'=>$user->id]) }}">Edit Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection