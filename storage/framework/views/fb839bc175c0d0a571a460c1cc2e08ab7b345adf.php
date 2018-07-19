<?php if(!$comments->isEmpty()): ?>
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row mb-20">
      <div class="container">
        <div class="card clearfix <?php echo $comment->user->tickets_role ? "card-info" : "card-default"; ?>">
          <div class="card-body row clearfix">
              <div class="col-2 text-center publisher-wrap">
                  <img src="<?php echo e(asset('storage/'.$comment->user->avatar)); ?>" alt="" width="80px;" class="rounded-circle ">
                  <p class="mt-5 mb-0"><?php echo $comment->user->name; ?></p>
              </div>
              <div class="col-10">
                  <div class="clearfix">
                      <small><?php echo $comment->created_at->diffForHumans(); ?></small>
                  </div>
                  <div class="mt-10">
                  <?php echo $comment->html; ?>

                  </div>
              </div>
          </div>
        </div>
      </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
