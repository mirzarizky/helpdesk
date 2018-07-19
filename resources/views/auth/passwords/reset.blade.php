@extends('layouts.app')

@section('content')
<section class="section lb">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-5">
              <div class="card pb-30 pl-30 pt-30 pr-30">
                <h4 class="module-title text-uppercase">{{trans('web.reset_password')}}</h4>
                  <div class="card-body">
                      <form class="sidebar-login" method="POST" action="{{ route('password.request') }}">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
                          <div class="form-group label-floating  mb-30">
                            <input type="text" placeholder="{{ __('E-Mail Address') }}" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                          </div>
                          <div class="form-group label-floating  mb-30">
                              <label for="password" class="control-label">{{ __('Password') }}</label>
                              <input id="password" type="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                              @if ($errors->has('password'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group label-floating">
                              <label for="password-confirm" class="control-label">{{trans('web.confirm-password')}}</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                          <button type="submit" class="btn btn-block btn-primary text-uppercase text-bold">{{ __('Login') }}</button>
                      </form>
                      <p class="mt-20">
                        <a  href="{{ route('login') }}"><i class="material-icons float-left">keyboard_backspace</i> {{trans('web.back_to_login')}}</a>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
