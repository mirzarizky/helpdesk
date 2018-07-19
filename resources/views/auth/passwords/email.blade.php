@extends('layouts.app')

@section('content')
<section class="section lb">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card  pb-10 pl-30 pt-30 pr-30">
                <h4 class="module-title text-uppercase">{{ __('Reset Password') }}</h4>
                <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif

                  <form method="POST" action="{{ route('password.email') }}">
                      @csrf
                      <p class="mb-20">Enter your email address and we'll send you a password reset link</p>
                      <div class="form-group">
                          <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                          @if ($errors->has('email'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="form-group mb-0">
                          <button type="submit" class="btn btn-primary text-uppercase text-bold">
                              {{ __('Send Password Reset') }}
                          </button>
                          <p class="mt-20">
                            <a class="btn-link " href="{{ route('login') }}"><i class="material-icons float-left">keyboard_backspace</i> Back to Login</a>
                          </p>
                      </div>
                  </form>
                </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
