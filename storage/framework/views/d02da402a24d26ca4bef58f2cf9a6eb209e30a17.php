<?php if($errors->first() != ''): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><?php echo e(trans('ticketit::lang.flash-x')); ?></button>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><?php echo e(trans('ticketit::lang.flash-x')); ?></button>
        <?php echo e(session('warning')); ?>

    </div>
<?php endif; ?>
<?php if(Session::has('status')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"><?php echo e(trans('ticketit::lang.flash-x')); ?></button>
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
