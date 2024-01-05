
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
        <li class="breadcrumb-item active">Table User</li>
    </ol>
</div>
@endsection
@section('cardTitle')
<div class="card-header">
    <h4 class="card-title">Users</h4>
</div>
@endsection
@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users
                        <form action="{{ route('formcreate-user') }}" class="d-inline">
                            <button class="btn btn-primary">
                                <i class="fa fa-plus"> </i>
                            </button>
                        </form>
                        </h4> 
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped verticle-middle">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $model as $value )
                                    <tr>
                                        
                                        <td>{{  $value->name }}</td>
                                        <td>{{  $value->email }}</td>
                                        <td>{{  $value->role }}</td>
                                        <td>
                                            <form action="{{ route('show-user',['id'=>$value->id]) }}" class="d-inline">
                                                <button class="btn btn-dark">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('editform-user',['id'=>$value->id]) }}" class="d-inline">
                                                <button class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('delete-user',['id'=>$value->id]) }}" method="post" class="d-inline">
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
    {{-- <form action="{{ route('formcreate-user') }}" class="d-inline">
        <button class="btn btn-square btn-dark">User 
            <span class="btn-icon-right">
                <i class="fa fa-plus"> </i>
            </span>
        </button>
    </form> --}}
</h4>
{{-- <h4 class="card-title">Table Hover</h4> --}}
</div>
<div class="card-body">
<div class="table-responsive">
    <table class="table table-hover">
        <thead style="color:black">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style="color:grey">
            @foreach ( $model as $value )
            <tr>
                <td>{{  $value->name }}</td>
                <td>{{  $value->email }}</td>
                <td>{{  $value->role }}</td>
                <td>
                    <form action="{{ route('show-user',['id'=>$value->id]) }}" class="d-inline">
                        <button class="btn btn-square btn-outline-dark">
                            <i class="fa fa-eye"></i>
                        </button>
                    </form>
                    {{-- <form action="{{ route('editform-user',['id'=>$value->id]) }}" class="d-inline">
                        <button class="btn btn-square btn-outline-dark">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>
                    <form action="{{ route('delete-user',['id'=>$value->id]) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                        <button class="btn btn-square btn-outline-danger" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $model->links() }}
</div>
@endsection
