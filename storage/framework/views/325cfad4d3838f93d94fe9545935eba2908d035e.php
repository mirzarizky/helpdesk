<?php $__env->startSection('content'); ?>
<section class="section lb">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-5">
                <div class="card pb-30 pl-30 pt-30 pr-30">
                    <h4 class="module-title text-uppercase">Login Account</h4>
                    <div class="card-body">
                      <?php if(session('success')): ?>
                          <div class="alert alert-success">
                              <?php echo e(session('success')); ?>

                          </div>
                      <?php endif; ?>
                      <?php if(session()->has('message')): ?>
                      <div class="alert alert-info">
                        <?php echo e(session()->get('message')); ?>

                      </div>
                      <?php endif; ?>
                        <form class="sidebar-login" method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group label-floating mb-30">
                              <label for="email" class="control-label"><?php echo e(trans('web.email_address')); ?></label>
                              <input type="text" id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                              <?php if($errors->has('email')): ?>
                                  <span class="invalid-feedback">
                                      <strong><?php echo e($errors->first('email')); ?></strong>
                                  </span>
                              <?php endif; ?>
                            </div>
                            <div class="form-group label-floating">
                              <label for="password" class="control-label"><?php echo e(__('Password')); ?></label>
                              <input type="password" id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                              <?php if($errors->has('password')): ?>
                                  <span class="invalid-feedback">
                                      <strong><?php echo e($errors->first('password')); ?></strong>
                                  </span>
                              <?php endif; ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> &nbsp;&nbsp;<?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary text-uppercase text-bold"><?php echo e(__('Login')); ?></button>
                        </form>
                        <p class="mt-20">
                          <a class="" href="<?php echo e(route('password.request')); ?>"><?php echo e(trans('web.forgot_password')); ?></a>
                        </p>
                        <p>
                          <?php echo e(trans('web.no_account')); ?>? <a  href="<?php echo e(route('register')); ?>"><?php echo e(trans('web.register_here')); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>