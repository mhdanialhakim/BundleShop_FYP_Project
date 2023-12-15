@extends('layout.register')
@section('content')
<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            
                                <a class="text-center" href=""> <h4>Register Form</h4></a>
    
                            <form action ="{{ route('register-user') }}" class="mt-5 mb-5 login-input" method="POST">
                                @csrf 
                                <div class="form-group">
                                    <input type="text" name="cname" class="form-control"  placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="caddress" class="form-control"  placeholder="Address" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="cpnumber" class="form-control"  placeholder="Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="cpassword" class="form-control" placeholder="Password" required>
                                </div>
                                <button class="btn login-form__btn submit w-100">Sign in</button>
                            </form>
                                <p class="mt-5 login-form__footer">Have account <a href="page-login.html" class="text-primary">Login </a> now</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection