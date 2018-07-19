<div id="wrapper">
    <header class="header">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-md navbar-light">
              <div class="container">
                  <a class="navbar-brand  logo" href="<?php echo e(url('/')); ?>"> </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link text-uppercase"  href="<?php echo e(url('/')); ?>"><?php echo e(trans('web.home')); ?></a></li>
                        <li><a class="nav-link text-uppercase"  href="<?php echo e(url('/faq')); ?>">FAQ</a></li>
                        <li><a class="nav-link text-uppercase"  href="<?php echo e(url('/forums')); ?>"><?php echo e(trans('web.discussions')); ?></a></li>
                        <li><a class="nav-link text-uppercase"  href="http://klola.id/blog" target="_blank">Blog</a></li>
                        <li><a class="nav-link text-uppercase"  href="<?php echo e(url('/tickets/create')); ?>"><?php echo e(trans('web.create-ticket')); ?></a></li>
                      </ul>

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                          <?php if(auth()->guard()->guest()): ?>
                              <li><a class="nav-btn text-uppercase" href="<?php echo e(route('login')); ?>"><?php echo e(trans('web.login')); ?></a></li>
                          <?php else: ?>
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      Hi, <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                  </a>

                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="<?php echo e(route('member')); ?>">
                                          <i class="material-icons">perm_identity</i>  <?php echo e(trans('web.manage-profile')); ?>

                                      </a>
                                      <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          <i class="material-icons">power_settings_new</i>  <?php echo e(trans('web.logout')); ?>

                                      </a>

                                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                          <?php echo csrf_field(); ?>
                                      </form>
                                  </div>
                              </li>
                          <?php endif; ?>
                          <li class="nav-item dropdown ml-10">
                            <a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown">
                                <span class="flag <?php echo e(strtolower(App::getLocale())); ?>"></span> <?php echo e(Config::get('languages')[App::getLocale()]); ?>

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width:90px">
                              <?php $__currentLoopData = Config::get('languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($lang != App::getLocale()): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('lang.switch', $lang)); ?>"><span class="flag <?php echo e(strtolower($lang)); ?>"></span> <?php echo e($language); ?></a>
                                  <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                      </ul>
                  </div>
              </div>
            </nav>
        </div><!-- end container -->
    </header><!-- end header -->
