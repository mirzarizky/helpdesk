@extends('layouts.app')

@section('content')
<section class="section lb">
  <div class="container">
    <div class="row justify-content-around">
        <div class="col-md-6">
            <div class="card pb-30 pl-30 pt-30 pr-30">
                <h4 class="module-title text-uppercase">Resend Activation Email</h4>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('auth.activate.resend') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} label-floating">
                            <label for="email" class="control-label">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary">
                                Resend
                            </button>
                        </div>
                    </form>
                    <p class="pt-20">
                      <a class="float-left" href="{{ route('login') }}"><i class="material-icons float-left">keyboard_backspace</i> Back to Login</a>
                      <a class="float-right" href="{{ route('register') }}">{{ __('Register here') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection
