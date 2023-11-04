
@extends('layouts2.app')




 @section('content')
 <div class="height-login">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="sininbox">

            <h2 class="mb-4 text-center">Sign In</h2>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
  
            <form method="POST" action="{{ route('login') }}">
                @csrf
  
                <div class="form-outline mb-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="email" class="form-label text-md-end">{{ __('Email Address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>
  
                <div class="form-outline mb-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="password" class="form-label text-md-end">{{ __('Password') }}</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>
  
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        @if (Route::has('password.request'))
                            <a class="btn-forgot" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
  
                <div class=" row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>

            </form>
  
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
     
 @endsection


 


