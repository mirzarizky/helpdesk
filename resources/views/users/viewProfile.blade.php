@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-30">
        @include('partials.navUserDashboard')
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title"> {{trans('web.change-profile')}}</h5>
            </div>
            <div class="card-body">
              <div class="row justify-content-around">
                <div class="col-md-8">
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
                  <div class="row justify-content-center">
                      <div class="profile-header-container">
                          <div class="profile-header-img">
                              <img class="rounded-circle img-thumbnail" src="{{ asset('storage/'.Auth::user()->avatar) }}" />
                          </div>
                      </div>
                  </div>
                  <form class="form-horizontal" method="POST" action="{{ route('edit-profile') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="file" class="form-control" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                      <small id="fileHelp" class="form-text text-muted">{{trans('web.photo_size')}}</small>
                    </div>
                    <div class="form-group row label-floating">
                        <label class="control-label">{{trans('web.name')}}</label>
                        <input class="form-control" type="text" value="{{$user->name}}" name="name">
                    </div>
                    <div class="form-group row label-floating">
                        <label class="control-label">{{trans('web.email_address')}}</label>
                        <input class="form-control" type="text" value="{{$user->email}}" name="email">
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
