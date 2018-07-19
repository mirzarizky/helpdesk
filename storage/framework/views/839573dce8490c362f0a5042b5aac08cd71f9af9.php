<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row mt-30">
        <?php echo $__env->make('partials.navUserDashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <i style="font-size: 3em;" class="float-left material-icons text-danger">note</i>
                  <span class="text-right float-right">
                      <h1><?php echo e($ticket_count); ?></h1>
                      <div class="mb-10"><?php echo e(trans('web.index-total-ticket')); ?></div>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <i style="font-size: 3em;" class="float-left material-icons text-success">chrome_reader_mode</i>
                  <span class="text-right  float-right">
                      <h1><?php echo e($forum_discussion_count); ?></h1>
                      <div class="mb-10"><?php echo e(trans('web.index-total-discussion')); ?></div>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <i style="font-size: 3em;" class="float-left material-icons text-info">question_answer</i>
                  <span class="text-right float-right">
                      <h1><?php echo e($forum_comment_count); ?></h1>
                      <div class="mb-10"><?php echo e(trans('web.index-total-comments')); ?></div>
                  </span>
                </div>
              </div>
            </div>

          </div>

          <div class="row mt-20">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>