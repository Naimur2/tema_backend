@extends('auth.layouts.app')

@section('content')
<div class="row justify-content-center">

    <div class="col-6">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-outline mb-4">
                <label class="form-label font-weight-normal text-dark" for="email">Your Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          
            <div class="form-outline mb-4">
                <label class="form-label font-weight-normal text-dark" for="password">Your Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
          
            <div class="row mb-4">
              <div class="col d-flex">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label font-weight-normal text-dark" for="remember">{{ __('Remember Me') }}</label>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary-2 btn-block mb-4">
                {{ __('Submit') }}
            </button>
          </form>
    </div>
</div>
@endsection