@extends('auth.loginlayouts')
<title>Thieves Thrift | Register</title>
@section('content')

<section class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <h1 class="text-center">Thieves Thrift</h1>
            <h2 class="text-center">Create Your Account</h2>
            <form class="text-left clearfix" action="{{ route('store') }}" method="post">
                @csrf
              <div class="form-group">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"  placeholder="Full Name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
              </div>
              <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"  placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
              </div>
              <div class="form-group">
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}"  placeholder="Address">
                    @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
              </div>
              <div class="form-group">
                <input type="tel" class="form-control @error('pnumber') is-invalid @enderror" id="pnumber" name="pnumber" value="{{ old('pnumber') }}"  placeholder="Phone Number">
                    @if ($errors->has('pnumber'))
                        <span class="text-danger">{{ $errors->first('pnumber') }}</span>
                    @endif
              </div>
              <div class="form-group">
                <input type="date" class="form-control @error('datebirth') is-invalid @enderror" id="datebirth" name="datebirth" value="{{ old('datebirth') }}"  placeholder="Birth Date">
                    @if ($errors->has('datebirth'))
                        <span class="text-danger">{{ $errors->first('datebirth') }}</span>
                    @endif
              </div>
              <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="Password Confirmation">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-main text-center" value="Register">Sign In</button>
              </div>
            </form>
            <p class="mt-20">Already hava an account ?<a href="{{ route('login') }}"> Login</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
 
@endsection

