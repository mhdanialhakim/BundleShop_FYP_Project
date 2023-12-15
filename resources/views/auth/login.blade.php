@extends('auth.loginlayouts')
<title>Thieves Thrift | Login</title>
@section('content')

<section class="signin-page account">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <h1 class="text-center">Thieves Thrift</h1>
            <h3 class="text-center">Welcome Back!</h3>
            <form class="text-left clearfix" action="{{ route('authenticate') }}" method="post" >
                @csrf
              <div class="form-group">
                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
              </div>
              <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" >
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                     @endif
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-main text-center" value="Login">Login</button>
              </div>
            </form>
            <p class="mt-20">New in this site ?<a href="{{ route('register') }}"> Create New Account</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
