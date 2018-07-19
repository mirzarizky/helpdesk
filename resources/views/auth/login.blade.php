@extends('layouts.app')

@section('content')
<section class="section lb">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-5">
                <div class="card pb-30 pl-30 pt-30 pr-30">
                    <h4 class="module-title text-uppercase">Login Account</h4>
                    <div class="card-body">
                      @if(session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                      @endif
                      @if(session()->has('message'))
                      <div class="alert alert-info">
                        {{ session()->get('message') }}
                      </div>
                      @endif
                        <form class="sidebar-login" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group label-floating mb-30">
                              <label for="email" class="control-label">{{trans('web.email_address')}}</label>
                              <input type="text" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                              @if ($errors->has('email'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                            </div>
                            <div class="form-group label-floating">
                              <label for="password" class="control-label">{{ __('Password') }}</label>
                              <input type="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                              @if ($errors->has('password'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> &nbsp;&nbsp;{{ __('Remember Me') }}
                                </label>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary text-uppercase text-bold">{{ __('Login') }}</button>
                        </form>
                        <p class="mt-20">
                          <a class="" href="{{ route('password.request') }}">{{trans('web.forgot_password')}}</a>
                        </p>
                        <p>
                          {{trans('web.no_account')}}? <a  href="{{ route('register') }}">{{trans('web.register_here')}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
@endsection
