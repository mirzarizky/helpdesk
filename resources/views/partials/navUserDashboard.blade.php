<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="{{ asset('storage/'.Auth::user()->avatar) }}" class="img-fluid img-thumbnail" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						 {{ Auth::user()->name }}
					</div>
          <div class="profile-usertitle-job text-muted">
            {{ Auth::user()->email  }}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav flex-column nav-pills ">
						<li class="nav-item">
							<a href="{{url('member')}}" class="nav-link"><i class="material-icons">home</i>{{trans('web.dashboard')}}</a>
						</li>
						<li class="nav-item">
							<a href="{{url('tickets')}}" class="nav-link">	<i class="material-icons">note</i>{{trans('web.tickets')}}</a>
						</li>
						<li class="nav-item">
							<a href="{{url('member/profile')}}" class="nav-link"><i class="material-icons">person</i>{{trans('web.account-setting')}}</a>
						</li>
						<li class="nav-item">
							<a href="{{url('member/change-password')}}" class="nav-link"><i class="material-icons">lock</i>{{trans('web.change-password')}}</a>
						</li>
						<li class="nav-item">
							<a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">power_settings_new</i>{{trans('web.logout')}}</a>
						</li>
					</ul>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
					</form>
				</div>
				<!-- END MENU -->
			</div>
		</div>
