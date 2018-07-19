@extends('layouts.app')

@section('content')
<section class="section lb">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-5">
                <div class="card pb-10 pl-30 pt-30 pr-30">
                        <h4 class="module-title text-uppercase">{{trans('web.register_member')}}</h4>
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
                            <form class="sidebar-login" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group label-floating">
                                  <label for="email" class="control-label">{{trans('web.name')}}</label>
                                  <input id="name"  type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                  @if ($errors->has('name'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                                </div>
                                <div class="form-group label-floating mt-20">
                                  <label for="email" class="control-label">{{trans('web.email_address')}}</label>
                                  <input type="text"  id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                                </div>
                                <div class="form-group label-floating mt-20">
                                  <label for="password" class="control-label">{{ __('Password') }}</label>
                                  <input type="password"  id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="invalid-feedback">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                                </div>
                                <div class="form-group label-floating mt-20">
                                  <label for="password" class="control-label">{{trans('web.confirm-password')}}</label>
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>

                                <button type="submit" class="btn btn-block btn-primary text-uppercase text-bold">  {{ __('Register') }}</button>
                            </form>
                            <p class="mt-20 text-center">
                              {!!trans('web.register_footer')!!}
                            </p>
                            <p class="mt-20">
                              <a  href="{{ route('login') }}"><i class="material-icons float-left">keyboard_backspace</i> {{trans('web.back_to_login')}}</a>
                            </p>
                        </div>
                    </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
@endsection
