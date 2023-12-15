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
      <li class="breadcrumb-item active">User Details</li>
  </ol>
</div>
@endsection
@section('cardTitle')
<div class="card-header">
    <h4 class="card-title">User Details</h4>
</div>
@endsection
@section('content')
{{-- <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
              
                <div class="card-body">
                  <a class="" href="index.html"> <h3>Customer Profile</h3></a><br>
                    <div class="form-validation">
                        <form>
                          <div class="form-group row">
                            <label class="col-lg-4 col-form-label" ><h6>Role:</h6> <span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                              {{ $model->role }}
                            </div>
                        </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Name:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->name }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-skill"><h6>Address:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->address }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Email:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->email }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Phone Number:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->pnumber }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" ><h6>Birth Date:</h6> <span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                  {{ $model->datebirth }}
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
    <table class="table table-bordered verticle-middle table-responsive-sm">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Birth Date</th>
            </tr>
        </thead>
        <tbody>
            <td style="color:black">{{ $model->name }}</td>
            <td style="color:black">{{ $model->email }}</td>
            <td style="color:black">{{ $model->address }}</td>
            <td style="color:black">0{{ $model->pnumber }}</td>
            <td style="color:black">{{ \Carbon\Carbon::parse($model->datebirth)->format('d F Y') }}</td>          
        </tbody>
    </table>
  </div>

@endsection
