<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo e(asset('storage/'.Auth::user()->avatar)); ?>" class="img-fluid img-thumbnail" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						 <?php echo e(Auth::user()->name); ?>

					</div>
          <div class="profile-usertitle-job text-muted">
            <?php echo e(Auth::user()->email); ?>

					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav flex-column nav-pills ">
						<li class="nav-item">
							<a href="<?php echo e(url('member')); ?>" class="nav-link"><i class="material-icons">home</i><?php echo e(trans('web.dashboard')); ?></a>
						</li>
						<li class="nav-item">
							<a href="<?php echo e(url('tickets')); ?>" class="nav-link">	<i class="material-icons">note</i><?php echo e(trans('web.tickets')); ?></a>
						</li>
						<li class="nav-item">
							<a href="<?php echo e(url('member/profile')); ?>" class="nav-link"><i class="material-icons">person</i><?php echo e(trans('web.account-setting')); ?></a>
						</li>
						<li class="nav-item">
							<a href="<?php echo e(url('member/change-password')); ?>" class="nav-link"><i class="material-icons">lock</i><?php echo e(trans('web.change-password')); ?></a>
						</li>
						<li class="nav-item">
							<a href="<?php echo e(route('logout')); ?>" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">power_settings_new</i><?php echo e(trans('web.logout')); ?></a>
						</li>
					</ul>
					<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
							<?php echo csrf_field(); ?>
					</form>
				</div>
				<!-- END MENU -->
			</div>
		</div>
