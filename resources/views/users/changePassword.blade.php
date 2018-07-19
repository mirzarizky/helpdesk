@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-30">
        @include('partials.navUserDashboard')
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">{{trans('web.change-password')}}</h5>
            </div>
            <div class="card-body">
              <div class="row justify-content-around">
                <div class="col-md-8">
                  <form class="form-horizontal" method="POST" action="{{ route('edit-password') }}">
                    {{ csrf_field() }}
                    @if (isset($errors) && count($errors) > 0)
                       <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif
                   @if (Session::has('message'))
                       <div class="alert alert-info">{{ Session::get('message') }}</div>
                   @endif
                   <div class="form-group row label-floating">
                       <label class="control-label">{{trans('web.old-password')}}</label>
                       <input class="form-control" type="password" value="" name="old_password">
                   </div>
                  <div class="form-group row label-floating">
                      <label class="control-label">Password</label>
                      <input class="form-control" type="password" value="" name="password">
                  </div>
                  <div class="form-group row label-floating">
                      <label class="control-label">{{trans('web.confirm-password')}}</label>
                      <input class="form-control" type="password" value="" name="password_confirmed">
                  </div>
                  <div class="form-group row">
                      <div class="float-right">
                          <input type="submit" class="btn btn-primary text-uppercase" value="{{trans('web.save')}}">
                      </div>
                  </div>
              </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
